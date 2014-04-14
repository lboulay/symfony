<?php
# src/tuto/WelcomeBundle/Form/Type/ContactType.php

namespace Dragoon\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;

class Fiche extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title_fr', 'text')
                ->add('title_vo', 'text')
                ->add('title_alt_fr', 'text')
                ->add('title_alt_vo', 'text')
                ->add('edition', 'text')
                ->add('year', 'integer')
                ->add('sortie', 'date')
                ->add('synopsis', 'textarea')
                ->add('reference', 'text')
                ->add('length', 'integer')
                ->add('save', 'submit', array('attr' => array('class' => 'btn btn-outline btn-success')))
                ->add('save&list', 'submit', array('attr' => array('class' => 'btn btn-outline btn-success')))
                ->add('cancel', 'reset', array('attr' => array('class' => 'btn btn-outline btn-danger')));
    }
    
    public function getName()
    {
        return 'Fiche';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Dragoon\AdminBundle\Entity\Fiche',
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
            'titlefr'
        );
    }
}