<?php
namespace UtExam\ProEvalBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\MediaBundle\Form\Type\MediaType;

/**
 *
 */
class ImagenAdmin extends AbstractAdmin
{
  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
    // 'attr' => array('class' => 'tinymce'), probar
    ->add('nombre', TextType::class, array("label" => "Nombre"))
    ->add('url', null, array(
          "label" => "Url (en caso de ser en linea)",
          'required' => false,
          "empty_data" => "NO APLICA",
          ))
    ->add('archive', 'sonata_media_type', array(
                 'provider' => 'sonata.media.provider.image',
                 'context'  => 'imagen',
                 'required' => false,
                 "label" => "Imagen",
                 "empty_data" => null,
            ))
    ->add('correcto', null, array(
          'required' => false,
          "label" => "¿Es la imagen correcta?",
          'attr' => array('class' => 'chech_Box_Confirm_Correct'),
        ));
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper
    ->add('nombre')
    ->add('url');
  }

  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
    ->addIdentifier('nombre')
    ->addIdentifier('url');
  }

  // public function configure() {
  //   $this->setTemplate('edit', '@UtExamProEval/Adminjs/edit_AdminImagen.html.twig');
  // }
  public function prePersist($object){
    //Variables
    // dump($usercode);
    // dump($object);
    // die;
    return $object;
  }
}


 ?>
