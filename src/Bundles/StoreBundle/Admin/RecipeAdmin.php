<?php

namespace Bundles\StoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class RecipeAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Post Title'))
            ->add('slug')
            ->add('is_active')
//            ->add('image', 'file')
            ->add('content') //if no type is specified, SonataAdminBundle tries to guess it
            ->add('category')
            ->add('features', 'sonata_type_model', array('expanded' => true, 'compound' => true, 'multiple' => true, 'label' => 'Выберите опции') )
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('slug')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('category')
            ->add('is_active', null, array('editable' => true))  
            ->add('slug')
            ->add('image', 'image')
            ->add('_action', 'actions', array('label' => 'Действия',
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }
}