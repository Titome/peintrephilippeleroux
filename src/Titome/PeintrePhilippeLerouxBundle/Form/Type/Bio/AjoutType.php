<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Type\Bio;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AjoutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('bio', 'ckeditor', array('label' => 'Biographie'));
    }
    
    public function getName() {
        return 'titome_peintrephilippelerouxbundle_bio_ajouttype';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Titome\PeintrePhilippeLerouxBundle\Entity\Bio');
    }
}