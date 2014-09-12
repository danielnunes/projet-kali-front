<?php

namespace Kali\Front\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\AbstractType;

/**
 * The form on registration page
 */
class ClientUserEditFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        $builder
            ->add('client', new ClientFormType(), array(
                'mapped' => false,)
            );
//            ->addEventListener(\Symfony\Component\Form\FormEvents::PRE_SET_DATA, function(\Symfony\Component\Form\FormEvent $event) use ($builder) {
//                    $form = $event->getForm();
//                    $data = $event->getData();
//                    if ($data === null) {
//                        return;
//                    }
//                    $form->add('email', 'email', array(
//                        'mapped' => false,
//                        'data' => $data->getUser()->getEmail()
//                    ));
//                });
    }

    public function getName()
    {
        return 'kali_front_client_user_edit';
    }
}