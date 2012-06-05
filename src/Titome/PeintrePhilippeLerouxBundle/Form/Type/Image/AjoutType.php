<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('file', 'file', array('label' => 'Image'))
                ->add('legende', 'text', array('label' => 'Légende'));
    }
    
    public function getName()
    {
        return 'titome_peintrephilippelerouxbundle_image_ajouttype';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Titome\PeintrePhilippeLerouxBundle\Entity\Image');
    }
}