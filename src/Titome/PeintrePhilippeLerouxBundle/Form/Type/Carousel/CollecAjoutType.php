<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Type\Carousel;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Carousel\AjoutType;

class CollecAjoutType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('images', 'collection', array('type' => new AjoutType));
    }
    
    public function getName()
    {
        return 'titome_peintrephilippelerouxbundle_carousel_collecajouttype';
    }
    
    
}