<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Titome\PeintrePhilippeLerouxBundle\Entity\Livre;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\Livre\AjoutHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Livre\AjoutType;

class LivreController extends Controller
{
	public function indexAction()
	{
		$repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Livre');
		$livres = $repository->findAll();

		return $this->render('TitomePeintrePhilippeLerouxBundle:Livre:index.html.twig', array('livres' => $livres));
	}
	
	/**
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function ajoutAction()
	{
		$livre = new Livre;
		$form = $this->createForm(new AjoutType(), $livre);

		$formHandler = new AjoutHandler($form, $this->getRequest(), $this->getDoctrine()->getEntityManager());

		$livreId = $formHandler->process();

		if ($livreId)
            return $this->redirect($this->generateUrl('AjoutPage', array('livreId' => $livreId)));
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Livre:ajout.html.twig', array('form' => $form->createView()));
	}
}