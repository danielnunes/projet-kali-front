<?php

namespace Kali\BackBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Kali\BackBundle\Form\Type\PersonFormType;

/**
 * The form on registration page
 */
class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder->remove('username');
        $builder->add('email', 'repeated', array(
                'type'            => 'email',
                'options'         => array('translation_domain' => 'FOSUserBundle'),
                'first_options'   => array('label' => 'form.email'),
                'second_options'  => array('label' => 'form.email'),
                'invalid_message' => "Les adresses email ne correspondent pas",
        ));
        $builder->add('person', new PersonFormType(), array(
            'mapped' => false
        ));
    }

    public function getName()
    {
        return 'kali_back_registration';
    }
}