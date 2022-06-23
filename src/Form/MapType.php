<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MapType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du Projet',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Nom du Projet',
                ]
            ])
            ->add('title', TextType::class, [
                'label' => 'Titre du projet',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Titre du Projet',
                ]
            ])
            ->add('description', TextType::class, [
                'label' => 'Description du projet',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Description du Projet',
                ]
            ])
            ->add('projection', IntegerType::class, [
                'label' => 'Système de coordonnées',
                'required' => false,
                "mapped" => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => '2154',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'attr' => ['id' => 'newMapProjectForm']
        ]);
    }

    public function getBlockPrefix()
    {
        return 'formMap';
    }
}
