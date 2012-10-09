<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Type\Expo;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AjoutType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('expo', 'ckeditor', array('label' => 'Expositions'));
	}

	public function getName()
	{
		return 'titome_peintrephilippelerouxbundle_expo_ajouttype';
	}

	public function getDafaultOptions(array $options)
	{
		return array('data_class' => 'Titome\PeintrePhilippeLerouxBundle\Entity\Expo');
	}
}