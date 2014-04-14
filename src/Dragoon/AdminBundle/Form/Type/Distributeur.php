<?php
# src/tuto/WelcomeBundle/Form/Type/ContactType.php

namespace Dragoon\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;

class Distributeur extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
                ->add('save', 'submit', array('attr' => array('class' => 'btn btn-outline btn-success')))
                ->add('save&list', 'submit', array('attr' => array('class' => 'btn btn-outline btn-success')))
                ->add('cancel', 'reset', array('attr' => array('class' => 'btn btn-outline btn-danger')));
    }
    
    public function getName()
    {
        return 'Distributeur';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Dragoon\AdminBundle\Entity\Distributeur',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            // une clé unique pour aider à la génération du jeton secret
            'intention'       => 'task_item',
        );
    }
    
    public function getColumnHeader()
    {
        return array(
            'id',
            'name'
        );
    }
}