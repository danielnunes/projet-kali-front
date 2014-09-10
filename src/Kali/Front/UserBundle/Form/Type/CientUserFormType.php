<?php

namespace Kali\Back\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\Form\AbstractType;
use Kali\Back\UserBundle\Form\Type\ClientFormType;

/**
 * The form on registration page
 */
class ClientUserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('email', 'email', array('label' => 'Email'))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'first_options' => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Confirmation'),
                'invalid_message' => 'Les mots de passe ne correspondent pas.',
            ))
            ->add('client', new ClientFormType(), array(
                'mapped' => false,)
            );
    }

    public function getName()
    {
        return 'kali_back_client_user';
    }
}