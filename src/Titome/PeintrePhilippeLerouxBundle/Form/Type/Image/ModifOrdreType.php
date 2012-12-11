<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Type\Image;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ModifOrdreType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('ordre', 'integer', array('label' => 'Ordre'));
	}
	
	public function getName()
	{
		return 'titome_peintrephilippelerouxbundle_image_modifordretype';
	}
	
	public function getDefaultOptions(array $options)
	{
		return array('data_class' => 'Titome\PeintrePhilippeLerouxBundle\Entity\Image');
	}
}