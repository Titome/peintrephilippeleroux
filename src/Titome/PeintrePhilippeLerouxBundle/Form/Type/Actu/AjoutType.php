<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Type\Actu;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AjoutType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('actu', 'ckeditor', array('label' => "Actualité"));
	}

	public function getName()
	{
		return 'titome_peintrephilippelerouxbundle_actu_ajouttype';
	}

	public function getDefaultOptions(array $options)
	{
		return array('data_class' => 'Titome\PeintrePhilippeLerouxBundle\Entity\Actu');
	}
}