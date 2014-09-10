<?php

namespace Kali\Back\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;


/**
 * The form on registration page
 */
class ClientFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('gender', 'choice', array(
                    'choices' => array('m' => 'masculin', 'f' => 'feminin'),
                    'required' => false,
                    'label' => 'sexe'))
                ->add('firstName', 'text', array(
                    'constraints' => new NotBlank(),
                    'label' => 'Prénom',)
                )
                ->add('lastName', 'text', array(
                    'constraints' => new NotBlank(),
                    'label' => 'Nom',)
                )
                ->add('birthDate', 'birthday', array(
                    'years' => range(date('Y') - 100, date('Y') - 16),
                    'empty_value' => array(
                        'year' => 'Année',
                        'month' => 'Mois',
                        'day' => 'Jour'
                    ),
                    'required' => true,
                    'constraints' => new NotBlank(),
                    'label' => 'Date de naissance',
                ))
                ->add('address', 'text', array(
                    'constraints' => new NotBlank(),
                    'label' => 'Adresse',)
                )
                ->add('city', 'text', array('label' => 'Ville',))
                ->add('postalCode', 'text', array('label' => 'Coede postale',))
                ->add('phone', 'text', array('label' => 'numéro de téléphone',))
                ->add('mobilePhone', 'text', array('label' => 'numéro de mobile',));
    }

    public function getName()
    {
        return 'kali_back_client';
    }
}