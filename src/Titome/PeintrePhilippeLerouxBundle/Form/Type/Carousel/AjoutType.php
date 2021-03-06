<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Type\Carousel;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AjoutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file', 'file', array('label' => 'Image'));
    }
    
    public function getName()
    {
        return 'titome_peintrephilippelerouxbundle_carousel_ajouttype';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Titome\PeintrePhilippeLerouxBundle\Entity\Carousel');
    }
}