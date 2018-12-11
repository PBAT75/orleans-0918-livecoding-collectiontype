<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('users', CollectionType::class, [
                'entry_type' => UserType::class,
//                'entry_options'  => array(
//                    'choice_label'  => 'firstname',
//                    'class' => User::class,
//                    'label' => false),
                'allow_delete' => true,
                'prototype' => true,
                'attr' => array(
                    'class' => 'my-selector',
                ),
                'allow_add' => true]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
