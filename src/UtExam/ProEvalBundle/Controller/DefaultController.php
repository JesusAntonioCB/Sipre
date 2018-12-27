<?php

namespace UtExam\ProEvalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use UtExam\ProEvalBundle\Entity\Alumnos;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/home")
 */
class DefaultController extends Controller
{
    public function indexAction()
    {
        if(false){
           $isLoggedIn = "true";
           $UID = $_SESSION["UID"];
           $em = $this->getDoctrine()->getManager();
           $query = $em->createQuery('
             SELECT a
             FROM UtExam\ProEvalBundle\Entity\Alumnos a
             WHERE a.codigoUsuario = :codeUser');
           $query->setParameter('codeUser', $UID);
           $ImageRes=$query->getArrayResult();
           dump($ImageRes);
           die;
           return $this->render('UtExamProEvalBundle:Examen:indexExam.html.twig',
             array(
               'userName'=> 'Antonio',
             )//final de array
           );//Final de return
        }
        else {
          $direccion= "propedeutico";
          return $this->render('UtExamProEvalBundle:Default:index.html.twig',
            array(
              'direccion' => $direccion,
            )
          );
        }
    }

    public function propedeuticoAction(){
        if(isset($_SESSION["UID"])){
          $isLoggedIn = "true";
          $UID = $_SESSION["UID"];
          $em = $this->getDoctrine()->getManager();
          $query = $em->createQuery('
            SELECT a
            FROM UtExam\ProEvalBundle\Entity\Alumnos a
            WHERE a.codigoUsuario = :codeUser');
          $query->setParameter('codeUser', $UID);
          $userRes=$query->getArrayResult()[0]['nombre'];
          // $json = file_get_contents('http://127.0.0.1:8000/api/v2/examen');
          // $service = json_decode($json);
          $query = $em->createQuery('
            SELECT e, partial u.{id, username}, p, pr, res, text, aud, vid, img
            FROM UtExam\ProEvalBundle\Entity\Examen e
            LEFT JOIN e.user u
            LEFT JOIN e.pregunta p
            LEFT JOIN p.pregunta pr
            LEFT JOIN pr.respuestas res
            LEFT JOIN res.texto text
            LEFT JOIN res.audio aud
            LEFT JOIN res.video vid
            LEFT JOIN res.imagen img
            ORDER BY e.id DESC');
            $examenRes=$query->getArrayResult();
          // dump($examenRes);
          // die;
          return $this->render('UtExamProEvalBundle:Examen:indexExam.html.twig',
            array(
              'userName'=> $userRes,
              'examen'=> $examenRes
            )//final de array
          );//Final de return
        }
        else {
          return $this->render('UtExamProEvalBundle:Examen:login.html.twig');
        }
    }

    public function examenFijoAction(Request $request){
        $codigoExam =$request->get('codigoExam');
        if(isset($_SESSION["UID"])){
          $isLoggedIn = "true";
          $UID = $_SESSION["UID"];
          $em = $this->getDoctrine()->getManager();
          $query = $em->createQuery('
            SELECT a
            FROM UtExam\ProEvalBundle\Entity\Alumnos a
            WHERE a.codigoUsuario = :codeUser');
          $query->setParameter('codeUser', $UID);
          $userRes=$query->getArrayResult()[0]['nombre'];
          // $json = file_get_contents('http://127.0.0.1:8000/api/v2/examen');
          // $service = json_decode($json);
          $query = $em->createQuery('
            SELECT e, partial u.{id, username}, p, pr, res, text, aud, vid, img
            FROM UtExam\ProEvalBundle\Entity\Examen e
            LEFT JOIN e.user u
            LEFT JOIN e.pregunta p
            LEFT JOIN p.pregunta pr
            LEFT JOIN pr.respuestas res
            LEFT JOIN res.texto text
            LEFT JOIN res.audio aud
            LEFT JOIN res.video vid
            LEFT JOIN res.imagen img
            WHERE e.codigoExam = :codeExam');
            $query->setParameter('codeExam', $codigoExam);
            $examenRes=$query->getArrayResult();

          // dump($examenRes);
          // die;
          return $this->render('UtExamProEvalBundle:Examen:indexExam.html.twig',
            array(
              'userName'=> $userRes,
              'examen'=> $examenRes
            )//final de array
          );//Final de return
        }
        else {
          return $this->render('UtExamProEvalBundle:Examen:login.html.twig');
        }
    }

    public function registerAction()
    {
      session_start();
      $usercode= chr(rand(ord("a"), ord("z"))).rand(1, 9).chr(rand(ord("a"), ord("z"))).
                 chr(rand(ord("a"), ord("z"))).rand(1, 9).chr(rand(ord("a"), ord("z"))).
                 chr(rand(ord("a"), ord("z"))).rand(1, 9).chr(rand(ord("a"), ord("z"))).
                 rand(1, 9).rand(1, 9).chr(rand(ord("a"), ord("z"))).rand(1, 9).rand(1, 9).
                 chr(rand(ord("a"), ord("z"))).rand(1, 9).chr(rand(ord("a"), ord("z"))).
                 chr(rand(ord("a"), ord("z"))).rand(1, 9).chr(rand(ord("a"), ord("z")));
      $_SESSION["UID"] = $usercode;
      date_default_timezone_set('America/Monterrey');
      $em = $this->getDoctrine()->getManager();
      $valueName = $_POST['alumno'];
      $valueCarrera = $_POST['carrera'];
      $valueTurno = $_POST['turno'];
      $alumno = new Alumnos();
      $alumno->setNombre($valueName);
      $alumno->setTurno($valueTurno);
      $alumno->setFecha(date('Y-m-d H:i:s'));
      $alumno->setTiempo(0);
      $alumno->setCalificacion(0);
      $alumno->setCodigoUsuario($usercode);
      $alumno->setCarrera($valueCarrera);
      $em ->persist($alumno);
      $em->flush();

      return new Response('success');
      // return $this->render('UtExamProEvalBundle:Examen:indexExam.html.twig',
      //   array(
      //     'userName'=> $valueName,
      //     'userCarrera' => $valueCarrera,
      //     'userTurno'=>$valueTurno,
      //   )//final de array);
      // );//Final de return
    }
    public function getMateriasAction(Request $request){
      $em = $this->getDoctrine()->getManager();
      $dificultad = $request->query->get("dificultad");
      $query = $em->createQuery('
        SELECT m
        FROM UtExam\ProEvalBundle\Entity\Materias m
        WHERE m.grado = :id');
      $query->setParameter('id', $dificultad);
      $examenRes=$query->getArrayResult();
      // dump($examenRes);
      // die;
      return new JsonResponse($examenRes);

    }
}
