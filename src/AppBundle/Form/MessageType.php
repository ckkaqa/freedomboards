<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MessageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message')
            ->add('backgroundColor', ChoiceType::class, [
                'choices' => [
                    'black' => 'Black',
                    'red' => 'Red',
                    'green' => 'Green',
                    'blue' => 'Blue',
                ],
                'placeholder' => 'Background Color',
            ])
            ->add('fontColor', ChoiceType::class, [
                'choices' => [
                    'black' => 'Black',
                    'red' => 'Red',
                    'green' => 'Green',
                    'blue' => 'Blue',
                ],
                'placeholder' => 'Font Color',
            ])
            ->add('font', ChoiceType::class, [
                'choices' => [
                    'Arial' => 'Arial',
                    'Times New Roman' => 'Times New Roman',
                    'Verdana' => 'Verdana',
                    'Courier New' => 'Courier New',
                ],
                'placeholder' => 'select font',
            ])
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Message'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_message';
    }


}
