<?php

namespace Kali\BackBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Doctrine\ORM\EntityRepository;


/**
 * Form on Step Two page
 */
class PersonFormType extends AbstractType {

    protected $tree_modify;

    public function __construct($tree_modify = NULL) {
        $this->tree_modify = $tree_modify;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('firstName', 'text', array(
                    'constraints' => new NotBlank(),)
                )
                ->add('lastName', 'text', array(
                    'constraints' => new NotBlank(),)
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
                ))
                ->add('address', 'text', array(
                    'constraints' => new NotBlank(),)
                )
                ->add('city', 'text')
                ->add('postalCode', 'text')
                ->add('phone', 'text')
                ->add('mobilePhone', 'text');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'inherit_data' => false,
            'data_class' => 'Kali\BackBundle\Entity\Person',
        ));
    }

    public function getName() {
        return 'kali_back_person';
    }

}
