<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;


class FormRandomNumbers extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numberMin', TextType::class,[
                    'constraints' => [
                        new Regex([
                            'pattern' => '/^\d+$/',
                            'message' => 'Veuillez saisir un entier.',
                        ]),
                    ],
                ])
            ->add('numberMax', TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^\d+$/',
                        'message' => 'Veuillez saisir un entier.',
                    ]),
                ],
            ])
            ->add('numberOfNumber', TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^\d+$/',
                        'message' => 'Veuillez saisir un entier.',
                    ]),
                ],
            ])
            ->add('genererUnChiffreAleatoire', SubmitType::class);
    }

}