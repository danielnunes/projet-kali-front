<?php

namespace Kali\Back\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\Form\AbstractType;
use Kali\Back\UserBundle\Form\Type\PersonFormType;

/**
 * The form on registration page
 */
class ClientUserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        $builder
            ->add('client', new ClientFormType(), array(
                'mapped' => false,)
            )
            ->addEventListener(\Symfony\Component\Form\FormEvents::PRE_SET_DATA, function(\Symfony\Component\Form\FormEvent $event) use ($builder) {
                    $form = $event->getForm();
                    $data = $event->getData();
                    if ($data === null) {
                        return;
                    }
                    $form->add('email', 'email', array(
                        'mapped' => false,
                        'data' => $data->getUser()->getEmail()
                    ));
                });
    }

    public function getName()
    {
        return 'kali_back_client_user_edit';
    }
}