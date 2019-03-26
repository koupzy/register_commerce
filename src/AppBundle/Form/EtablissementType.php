<?php
/**
 * Created by PhpStorm.
 * User: koupzy
 * Date: 02/02/19
 * Time: 11:53
 */

namespace AppBundle\Form;

use AppBundle\Entity\Activity;
use AppBundle\Entity\Etablissement;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtablissementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('localisation', TextType::class, [
            'attr' => [
                'class' => 'form-control'
            ]
        ])
            ->add('adressePostal', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('origine', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('precExploitNom', TextType::class, [
                'label' => 'Nom du préccedent exploitant',
                'property_path' => 'precExploit[nom]',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])->add('precExploitPrenom', TextType::class, [
                'label' => 'Prenom du préccedent exploitant',
                'property_path' => 'precExploit[prenom]',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])->add('precExploitAdresse', TextType::class, [
                'label' => 'Adresse du préccedent exploitant',
                'property_path' => 'precExploit[adresse]',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])->add('precExploitRccm', TextType::class, [
                'label' => 'RCCM du préccedent exploitant',
                'property_path' => 'precExploit[rccm]',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('loueurFondNom', TextType::class, [
                'label' => 'Nom du loueur de fond',
                'property_path' => 'loueurFond[nom]',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])->add('loueurFondDenomination', TextType::class, [
                'label' => 'Denomination du loueur de fond',
                'property_path' => 'loueurFond[denomination]',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])->add('loueurFondAdresse', TextType::class, [
                'label' => 'Adresse du loueur de fond',
                'property_path' => 'loueurFond[adresse]',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('etatModif', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etablissement::class,
            'csrf_protection' => true
        ]);
    }

}