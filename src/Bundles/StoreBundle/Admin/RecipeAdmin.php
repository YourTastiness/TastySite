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
        $pictureFormField = ['label' => 'Изображение1',
                             'required' => false,
                             'data_class' => null];
        if ($this->getSubject()->getImage()) {
            $pictureFormField['help'] = '<img src="/' . $this->getSubject()->getImage() . '" class="admin-preview" />';}
        $formMapper
            ->add('title', 'text', array('label' => 'Post Title'))
            ->add('slug')
            ->add('is_active')
            ->add('imageFile', 'file',$pictureFormField)
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
    
    private function _processFiles($object) {
        if ($object->getImageFile() instanceof \Symfony\Component\HttpFoundation\File\File) {
            $object->setImage($this->_persistFile($object->getImageFile(), \Bundles\StoreBundle\Entity\Recipe::IMAGE_BASEPATH, true, $object->getImage()));
        }
    }
    
      public function prePersist($object) { //Чего делаем перед созданием?
        $this->_processFiles($object);
        parent::prePersist($object);
    }
    
    public function preUpdate($object) { //Чего делаем перед обновлением?
        $this->_processFiles($object, true);
        parent::preUpdate($object);
    }
    
    public function preRemove($object) { //Чего делаем перед удалением?
        if (is_file($object->getImage())) 
            unlink($object->getImage());

        parent::preRemove($object);
    } 
    
    protected function _persistFile(\Symfony\Component\HttpFoundation\File\File $file, $basepath, $update = false, $previous = '') {
        if ($update && is_file($previous)) {
            unlink($previous);
        }
        $filename = uniqid() . '.' . $file->guessExtension();
        $file->move($basepath, $filename);
        return $basepath . $filename;
    }
}