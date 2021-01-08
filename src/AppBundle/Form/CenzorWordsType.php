<?php


namespace AppBundle\Form;

use AppBundle\Entity\CenzorWord;
use Symfony\Component\Form\AbstractType;
use AppBundle\Entity\CenzorWords;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CenzorWordsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $ncw= new CenzorWord();
        $builder->add('words', CollectionType::class, [
            'entry_type' => CenzorWordType::class,
            'entry_options' => ['label' => false],
            'allow_add' => true,
            'prototype' => true,
            'prototype_data' => $ncw,
            'allow_delete' => true
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CenzorWords::class,
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cenzorwords';
    }
}