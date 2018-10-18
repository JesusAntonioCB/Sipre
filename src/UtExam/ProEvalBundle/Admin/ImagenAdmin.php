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
    ->add('url', TextType::class, array(
          "label" => "Url (en caso de ser en linea)",
          'required' => false,
          "empty_data" => "NO APLICA",
          ))
    ->add('media', 'sonata_media_type', array(
                 'provider' => 'sonata.media.provider.image',
                 'context'  => 'imagen',
                 'required' => false,
                 "label" => "Imagen",
                 'data_class' => 'Application\Sonata\MediaBundle\Entity\Media',
                 "empty_data" => null,
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

  public function configure() {
    $this->setTemplate('edit', '@UtExamProEval/Adminjs/edit_AdminImagen.html.twig');
  }
}


 ?>
