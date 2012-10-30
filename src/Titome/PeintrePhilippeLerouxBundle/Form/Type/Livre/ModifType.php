<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Type\Livre;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ModifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', 'text', array('label' => 'Titre'));
    }
    
    public function getName()
    {
        return 'titome_peintrephilippelerouxbundle_livre_modiftype';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Titome\PeintrePhilippeLerouxBundle\Entity\Livre');
    }
}