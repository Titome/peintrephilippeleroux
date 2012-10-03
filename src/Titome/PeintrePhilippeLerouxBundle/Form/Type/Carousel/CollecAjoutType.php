<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Type\Carousel;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Carousel\AjoutType;

class CollecAjoutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $image = new AjoutType;
        
        $builder->add('images', 'collection', array(
            'type'    => $image,
            ));
    }
    
    public function getName()
    {
        return 'titome_peintrephilippelerouxbundle_carousel_collecajouttype';
    }
}