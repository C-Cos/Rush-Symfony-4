<?php

namespace App\Form;

use App\Entity\Lists;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('listname')
            ->add('description')
            //->add('create_date')
            //->add('edit_date')
            ->add('privacy')
            //->add('user')
            //->add('movie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lists::class,
        ]);
    }
}
