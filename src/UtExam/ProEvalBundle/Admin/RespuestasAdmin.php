<?php
namespace UtExam\ProEvalBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\Type\CollectionType;

/**
 *
 */
class RespuestasAdmin extends AbstractAdmin
{
  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
    ->add('texto','sonata_type_collection', array(
          'by_reference' => false,
          'label' => 'Respuesta en Texto',
          'required'      => false,
          'type_options' => array(

              'delete' => false,
              'delete_options' => array(
                  // You may otherwise choose to put the field but hide it
                  'type'         => 'hidden',
                  // In that case, you need to fill in the options as well
                  'type_options' => array(
                      'mapped'   => false,
                      'required' => false,
                  )
              )
          )
        ), array(
            'edit' => 'inline',
            'inline' => 'table',
            'sortable' => 'position'
        ))
     ->add('imagen','sonata_type_collection', array(
           'by_reference' => false,
           'label' => 'Respuesta en Imagen',
           'required'      => false,
           'type_options' => array(

               'delete' => false,
               'delete_options' => array(
                   // You may otherwise choose to put the field but hide it
                   'type'         => 'hidden',
                   // In that case, you need to fill in the options as well
                   'type_options' => array(
                       'mapped'   => false,
                       'required' => false,
                   )
               )
           )
         ), array(
             'edit' => 'inline',
             'inline' => 'table',
             'sortable' => 'position',
         ))
      ->add('audio','sonata_type_collection', array(
            'by_reference' => false,
            'label' => 'Respuesta en Audio',
            'required'      => false,
            'type_options' => array(

                'delete' => false,
                'delete_options' => array(
                    // You may otherwise choose to put the field but hide it
                    'type'         => 'hidden',
                    // In that case, you need to fill in the options as well
                    'type_options' => array(
                        'mapped'   => false,
                        'required' => false,
                    )
                )
            )
          ), array(
              'edit' => 'inline',
              'inline' => 'table',
              'sortable' => 'position'
          ))
       ->add('video','sonata_type_collection',array(
             'by_reference' => false,
             'label' => 'Respuesta en Video',
             'required'      => false,
             'type_options' => array(

                 'delete' => false,
                 'delete_options' => array(
                     // You may otherwise choose to put the field but hide it
                     'type'         => 'hidden',
                     // In that case, you need to fill in the options as well
                     'type_options' => array(
                         'mapped'   => false,
                         'required' => false,
                     )
                 )
             )
           ), array(
               'edit' => 'inline',
               'inline' => 'table',
               'sortable' => 'position'
           ));
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper
    ->add('texto');
  }

  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
    ->add('texto');
  }
}


 ?>
