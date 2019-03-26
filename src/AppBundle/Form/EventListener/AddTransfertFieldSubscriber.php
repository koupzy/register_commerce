<?php

namespace AppBundle\Form\EventListener;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

/**
 * Created by PhpStorm.
 * User: koupzy
 * Date: 23/03/19
 * Time: 15:51
 */
class AddTransfertFieldSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [FormEvents::PRE_SET_DATA => 'preSetData'];
    }

    public function preSetData(FormEvent $event)
    {
        $activity = $event->getData();
        $form = $event->getForm();

        if ($activity && null !== $activity->getId() ){
            $form->add('transfert', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false
                ],
                'label' => 'Transfert',
                'required' => true,
                'attr' => [
                    'class' => 'form-control form-control-select2'
                ]
            ]);
        }

    }


}