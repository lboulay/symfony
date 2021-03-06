<?php
# src/tuto/WelcomeBundle/Form/Type/ContactType.php

namespace Dragoon\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;

class User extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text')
                ->add('password', 'password')
                ->add('email', 'email')
                ->add('is_active', 'checkbox', array('required'=>false))
                ->add('save', 'submit', array('attr' => array('class' => 'btn btn-outline btn-success')))
                ->add('save&list', 'submit', array('attr' => array('class' => 'btn btn-outline btn-success')))
                ->add('cancel', 'reset', array('attr' => array('class' => 'btn btn-outline btn-danger')));
    }

    public function getName()
    {
        return 'user_profile';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Dragoon\AdminBundle\Entity\User',
        );
    }
    
    public function getColumnHeader()
    {
        return array(
            'id',
            'username'
        );
    }
}