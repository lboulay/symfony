<?php
# src/tuto/WelcomeBundle/Form/Type/Dvdfr/search.php

namespace Dragoon\AdminBundle\Form\Type\Dvdfr;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;

class Search extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('search', 'text')
            ->add('searchBtn', 'button', 
                array(
                    'attr' => array('class' => 'btn btn-outline btn-success')
                )
            );
    }
    
    public function getName()
    {
        return 'DVDfr_search';
    }
}