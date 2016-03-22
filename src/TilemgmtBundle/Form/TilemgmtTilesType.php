<?php

namespace TilemgmtBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TilemgmtTilesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mapId')
            ->add('tileColRow')
            ->add('tileImageUrl')
            ->add('tileSectorName')
            ->add('tilePlayable')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TilemgmtBundle\Entity\TilemgmtTiles'
        ));
    }
}
