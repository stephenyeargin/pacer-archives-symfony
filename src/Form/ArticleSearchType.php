<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setAction($options['action'])
            ->add('s', SearchType::class, [
                'label' => 'Search Term'
            ])
            ->add('index', ChoiceType::class, [
                'choices' => [
                    'Article Content' => 'content',
                    'Author Bylines' => 'author'
                ],
                'data' => 'content',
                'label' => 'Search Index',
                'expanded' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'action' => '',
            'mapped' => false
        ]);
    }
}