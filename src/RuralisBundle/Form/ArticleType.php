<?php

namespace RuralisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ArticleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeAffichage', ChoiceType::class, array (
                'placeholder' => "Type d'affichage",
                'choices' => array (
                    '1' => 'Grande image',
                    '2' => 'Petite image',
                )
            ))
            ->add('nom')
            ->add('descriptif')
            ->add('contenu')
            ->add('auteur')
            ->add('date', DateType::class, array(
                    'widget' => 'single_text',
                    'format' => 'dd-MM-yyyy',
                    'attr' => array(
                        'class' => 'datepicker'
                    )
                )
            )
            ->add('image', ImageType::class)
           ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RuralisBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ruralisbundle_article';
    }


}
