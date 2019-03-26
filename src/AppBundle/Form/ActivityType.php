<?php
/**
 * Created by PhpStorm.
 * User: koupzy
 * Date: 02/02/19
 * Time: 10:48
 */

namespace AppBundle\Form;

use AppBundle\Entity\Activity;
use AppBundle\Form\EventListener\AddTransfertFieldSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActivityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('enseigne', TextType::class, [
            'attr' => [
                'class' => 'form-control'
            ]
        ])
            ->add('nomCom', TextType::class)
            ->add('activite', TextType::class)
            ->add('dateDebut', DateType::class,[
                'widget' => 'choice',
                'html5'  => false,
                'placeholder' => [
                    'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour'
                ]
            ])
            ->add('numeroRccm', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('nbreSalarie', IntegerType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('etablissements', CollectionType::class, [
                'entry_type'   => EtablissementType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label'       => false,
                'entry_options' => [
                    'label' => false
                ]
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom de l\'engageur ',
                'property_path' => 'engageurs[nom]',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])->add('prenom', TextType::class, [
                'label' => 'Prenom de l\'engageur ',
                'property_path' => 'engageurs[prenom]',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])->add('lieuNais', TextType::class, [
                'label' => 'Lieu de naissance de l\'engageur ',
                'property_path' => 'engageurs[lieuNais]',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])->add('domicile', TextType::class, [
                'label' => 'Domicile du engageur ',
                'property_path' => 'engageurs[domicile]',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])->add('nationalite', ChoiceType::class, [
                'label' => 'Nationalité du engageur ',
                'choices' => [
                    'Afhgan' => 'afhgan',
                    'Burkinabé' => 'burkinabé',
                    'Ivoirienne' => 'ivoirienne'
                ],
                'property_path' => 'engageurs[nationalite]',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])->add('dateNais', DateType::class, [
                'label' => 'Date de naissance de l\'engageur ',
                'property_path' => 'engageurs[dateNais]',
                'html5' => false,
                'widget' => 'choice'
            ]);
        $builder->addEventSubscriber(new AddTransfertFieldSubscriber());
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Activity::class,
            'csrf_protection' => true
        ]);
    }

}