<?php
# src/tuto/WelcomeBundle/Form/Type/ContactType.php

namespace Dragoon\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Dragoon\AdminBundle\Form\StarJob;

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
                ->add('categories', 'entity', array(
                    'class' => 'DragoonAdminBundle:Category',
                    'expanded' => true,
                    'multiple' => true
                ))
                ->add('distributeurs', 'entity', array(
                    'class' => 'DragoonAdminBundle:Distributeur',
                    'expanded' => true,
                    'multiple' => true
                ))
                ->add('editeurs', 'entity', array(
                    'class' => 'DragoonAdminBundle:Editeur',
                    'expanded' => true,
                    'multiple' => true
                ))
                ->add('studios', 'entity', array(
                    'class' => 'DragoonAdminBundle:Studio',
                    'expanded' => true,
                    'multiple' => true
                ))
                ->add('stars', 'collection', array(
                    'type' => new StarJob(),
                    'options' => array(
                        'data_class' => 'Dragoon\AdminBundle\Entity\StarJob'
                    ),
                    'allow_add' => true,
                    'allow_delete'  => true,
                    'by_reference' => false,
                    'attr' => array('data-name'=>'Star','class'=>'multiple well')
                ))
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
    
    public function getAddBtn()
    {
        return array(
            array(
                'href'  => $this->generateUrl('dragoon_film_add_dvdfr', array('entity'=> 'form')),
                'title' => 'Ajouter via DVDFR'
            )
        );
    }
}