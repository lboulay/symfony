<?php
# src/tuto/WelcomeBundle/Form/Type/ContactType.php

namespace Dragoon\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;

class News extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text')
                ->add('content', 'textarea')
                ->add('published', 'checkbox', array('required'=>false, ))
            ->add('save', 'button', array('attr' => array('class' => 'btn btn-outline btn-success')))
            ->add('save&list', 'submit', array('attr' => array('class' => 'btn btn-outline btn-success')))
            ->add('cancel', 'reset', array('attr' => array('class' => 'btn btn-outline btn-danger')));
    }
}