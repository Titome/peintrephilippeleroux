<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Type\Livre;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AjoutType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('nom', 'text', array('label' => 'Nom'))
				->add('file', 'file', array('label' => 'Image de la couverture'));
	}
}