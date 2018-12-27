<?php
namespace UtExam\ProEvalBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 *
 */
class PreguntasAutoAdmin extends AbstractAdmin
{
  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
    ->add('materias', 'sonata_type_model', array(
          "label" => "Materia a la que pertenese",
          'attr' => ["class" => "Materias"],
          'placeholder'   => 'Selecciona una Materia...',
          'attr' => ["class" => "Materias"]))
    ->add('tipoPregunta', 'sonata_type_model', array(
          "label" => "Tipo de pregunta"))
    ->add('cantidad', TextType::class, array(
          "label" => "Cantidad"));
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper
    ->add('materias')
    ->add('nivel')
    ->add('tipoPregunta');
  }

  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
    ->add('materias')
    ->add('nivel')
    ->add('tipoPregunta');
  }

  // public function configure() {
  //   $this->setTemplate('edit', '@UtExamProEval/CRUD/edit_js_from_preguntas.html.twig');
  // }

  // public function configure() {
  //   $this->setTemplate('edit', '@UtExamProEval/CRUD/edit_js_from_preguntas.html.twig');
  // }
  // public function prePersist($object){
  //   //Variables
  //
  //   // dump($object);
  //   // die;
  //   // $size = getpreguntasize($object->getMedia()->getPathname());
  //   // $object->setWidth($size[0]);
  //   // $object->setHeight($size[1]);
  //   // $object->setFormat($object->getMedia()->guessClientExtension());
  //   // $object->setMediaName($object->getMedia()->getClientOriginalName());
  //   // $object->setUpdatedAt(new \DateTime());
  //   return $object;
  // }
}


 ?>
