<?php
/**
 * Created by PhpStorm.
 * User: koupzy
 * Date: 10/02/19
 * Time: 12:53
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class conjointType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('dateNaiss', DateTimeType::class)
            ->add('lieuNaiss', TextType::class)
            ->add('regimeMat', TextType::class)
            ->add('ClauseRest', TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
    }


}