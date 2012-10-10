<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\Actu\AjoutHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Actu\AjoutType;

class ActuController extends Controller
{
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Actu');
		$actu = $repository->find(1);

		return $this->render('TitomePeintrePhilippeLerouxBundle:Actu:actu.html.twig', array('actu' => $actu));
	}

	/**
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function ajoutAction()
	{
		$repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Actu');
		$actu = $repository->find(1);
		$form = $this->createForm(new AjoutType(), $actu);
		$formHandler = new AjoutHandler($form, $this->getRequest(), $this->getDoctrine()->getEntityManager());

		if ($formHandler->process())
			return $this->redirect($this->generateUrl('Actu'));

		return $this->render('TitomePeintrePhilippeLerouxBundle:Actu:ajout.html.twig', array('form' => $form->createView()));
	}
}