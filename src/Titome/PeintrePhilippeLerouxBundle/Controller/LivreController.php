<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Titome\PeintrePhilippeLerouxBundle\Entity\Livre;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Livre\AjoutType;

class LivreController extends Controller
{
	/**
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function ajoutAction()
	{
		$livre = new Livre;
	}
}