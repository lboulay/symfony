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
                ->add('is_active', 'checkbox');
    }

    public function getName()
    {
        return 'user_profile';
    }
}
?>