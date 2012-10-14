<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Type\Email;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EmailType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('nom',	 'text',	 array('label' => 'Votre nom'))
			->add('email',	 'email',	 array('label' => 'Votre email'))
			->add('message', 'textarea', array('label' => 'Votre message'))
		;
	}

	public function getName()
	{
		return 'titome_peintrephilippelerouxbundle_email_emailtype';
	}

	public function getDefaultOptions(array $options)
	{
		return array('data_class' => 'Titome\PeintrePhilippeLerouxBundle\Entity\Email');
	}
}