<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Type\Carousel;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ModifType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('ordre', 'integer', array('label' => 'Ordre'));
    }
    
    public function getName()
    {
        return 'titome_peintrephilippelerouxbundle_carousel_modiftype';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Titome\PeintrePhilippeLerouxBundle\Entity\Carousel');
    }
}