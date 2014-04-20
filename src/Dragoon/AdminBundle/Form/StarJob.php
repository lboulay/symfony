<?php

namespace Dragoon\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;

class StarJob extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('star', 'entity', array(
                    'class' => 'DragoonAdminBundle:Star',
                    'expanded' => false,
                    'multiple' => false
                ))
                ->add('job', 'entity', array(
                    'class' => 'DragoonAdminBundle:Job',
                    'expanded' => false,
                    'multiple' => false
                ))
            ;
    }
    
    public function getName()
    {
        return 'StarJob';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Dragoon\AdminBundle\Entity\StarJob',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            // une clé unique pour aider à la génération du jeton secret
            'intention'       => 'task_item',
        );
    }
    
}