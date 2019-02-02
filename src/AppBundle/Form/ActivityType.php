<?php
/**
 * Created by PhpStorm.
 * User: koupzy
 * Date: 02/02/19
 * Time: 10:48
 */

namespace AppBundle\Form;


use AppBundle\AppBundle;
use AppBundle\Entity\Activity;
use AppBundle\Entity\Etablissement;
use AppBundle\Entity\Exploitant;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActivityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('enseigne', TextType::class)
            ->add('nomCom', TextType::class)
            ->add('activite', TextType::class)
            ->add('transfert', BooleanType::class)
            ->add('dateDebut', DateTimeType::class)
            ->add('numeroRccm', TextType::class)
            ->add('nbreSalarie', IntegerType::class)
            ->add('exploitant', EntityType::class,[
                'data_class' => Exploitant::class,
                'choice_label' => 'prenom'
            ])
            ->add('engageurs', CollectionType::class, [
                'entry_type' => [
                    'nom' => TextType::class,
                    'prenom' => TextType::class,
                    'lieuNais' => TextType::class,
                    'dateNais' => DateTimeType::class,
                    'nationalite' => ChoiceType::class,[
                        'entry_options' => [
                            'choices' => [
                                'Afhgan' => 'afhgan',
                                'Burkinabé' => 'burkinabé',
                                'Ivoirienne' => 'ivoirienne'
                            ]
                        ]
                    ]
                ]
            ])
        ->add('etablissements', CollectionType::class, [
            'entry_type' => EtablissementType::class
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Activity::class,
            'csrf_protection' => true
        ]);
    }
}