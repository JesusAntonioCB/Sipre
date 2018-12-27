<?php
namespace UtExam\ProEvalBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\Type\AdminType;


/**
 *
 */
class VideoPreguntaAdmin extends AbstractAdmin
{
  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
    ->add('nombre', TextType::class, array("label" => "Nombre"))
    ->add('url', TextType::class, array(
          "label" => "Url (en caso de ser en linea)",
          'required' => false,
          "empty_data" => "NO APLICA"
          ))
    ->add('archive', 'sonata_media_type', array(
                 'provider' => 'sonata.media.provider.file',
                 'context'  => 'imagen',
                 'required' => false,
                 "label" => "Video",
                 "empty_data" => null
            ))
    ->add('correcto', null, array(
      "label" => "¿Es el Video correcta?",
      'attr' => array('class' => 'chech_Box_Confirm_Correct'),
    ));
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper
    ->add('nombre');
  }

  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
    ->addIdentifier('nombre');
  }

  public function configure() {
    $this->setTemplate('edit', '@UtExamProEval/Adminjs/edit_AdminVideo.html.twig');
  }

  public function preUpdate($object){
    dump(get_class_methods($object->getMedia()->getbinaryContent()));
    dump($object->getMedia()->getbinaryContent()->getFileInfo());
    dump($object->getMedia()->getbinaryContent());
    dump($object->getMedia()->getbinaryContent()->getRealPath());
    dump($object->getMedia()->getbinaryContent());
    dump($object);
    die();
    $object->setWidth($width);
    $object->setHeight($height);
    $object->setFormat($object->getMedia()->guessClientExtension());
    $object->setMediaName($object->getMedia()->getClientOriginalName());
    $object->setUpdatedAt(new \DateTime());
    // dump(get_class_methods($object));
    // dump(get_class_methods($object->getMedia()));
    // dump($object->getMedia()->getBasename());
    // die();
    return $object;
  }

}


 ?>
