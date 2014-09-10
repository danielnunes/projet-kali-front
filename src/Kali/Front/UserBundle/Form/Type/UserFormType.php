<?php

namespace Kali\Back\UserBundle\Form\Type;

use Kali\Back\UserBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserFormType extends AbstractType
{
    private $roles;
    
    function __construct($roles) {
        $this->roles = $roles;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array('label' => 'Email'))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'first_options' => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Confirmation'),
                'invalid_message' => 'Les mots de passe ne correspondent pas.',
            ))
            ->add('roles', 'choice', array(
                'choices' => $this->roles,
                'label' => 'Roles',
                'expanded' => true,
                'multiple' => true,
                )
            );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kali_back_userbundle_user';
    }
}