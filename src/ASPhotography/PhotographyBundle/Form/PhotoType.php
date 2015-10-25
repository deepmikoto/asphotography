<?php

namespace ASPhotography\PhotographyBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class PhotoType
 * @package ASPhotography\PhotographyBundle\Form
 */
class PhotoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('caption', 'textarea', [
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('category', 'entity',[
                'class' => 'ASPhotography\PhotographyBundle\Entity\Category',
                'placeholder' => 'Choose a category for your photo',
                'empty_data' => null,
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ],
                'query_builder' => function( EntityRepository $er ){
                    return $er->createQueryBuilder( 'c' )
                        ->orderBy( 'c.name', 'ASC' )
                    ;
                }
            ])
            ->add('file', 'file', [
                'required' => false,
                'attr' => [
                    'onchange' => '$("#upload-file-info").html($(this).val());'
                ]
            ])
            ->add('save', 'submit', [
                'attr' => [
                    'class' => 'btn btn-primary pull-right'
                ]
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'ASPhotography\PhotographyBundle\Entity\Photo'
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'asphotography_photographybundle_photo';
    }
}
