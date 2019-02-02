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
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtablissementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('localisation', TextType::class)
            ->add('adressePostal', TextType::class)
            ->add('origine', TextType::class)
            ->add('precExploit', CollectionType::class, [
                'entry_type' => [
                    'nom' => TextType::class,
                    'prenom' => TextType::class,
                    'adresse' => TextType::class,
                    'rccm' => TextType::class,
                ],
                'by_reference' => false
            ])
            ->add('loueurFond', CollectionType::class, [
                'entry_type' => [
                    'nom' => TextType::class,
                    'denomination' => TextType::class,
                    'adresse' => TextType::class,
                ],
                'by_reference' => true
            ])
            ->add('etatModif', TextType::class)
            ->add('principale', BooleanType::class)
            ->add('activity', EntityType::class, [
                'data_class' => Activity::class,
                'choice_label' => 'nomCom'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etablissement::class,
            'csrf_protection' => true
        ]);
    }

}