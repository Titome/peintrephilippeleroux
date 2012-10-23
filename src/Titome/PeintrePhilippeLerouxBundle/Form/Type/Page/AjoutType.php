<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Type\Page;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AjoutType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('file', 'file', array('label' => 'Page'));
	}

	public function getName()
	{
		return 'titome_peintrephilippelerouxbundle_page_ajouttype';
	}

	public function getDefaultOptions(array $options)
	{
		return array('data_class' => 'Titome\PeintrePhilippeLerouxBundle\Entity\Page');
	}
}