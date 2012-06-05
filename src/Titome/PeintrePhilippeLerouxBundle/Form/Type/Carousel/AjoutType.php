<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Type\Carousel;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AjoutType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('nom')
                ->add('active');
    }
    
    public function getName()
    {
        return 'titome_peintrephilippelerouxbundle_carousel_ajouttype';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Titome\PeintrePhilippeLerouxBundle\Entity\Image');
    }
}