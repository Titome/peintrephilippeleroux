<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Titome\PeintrePhilippeLerouxBundle\Entity\Livre;
use Titome\PeintrePhilippeLerouxBundle\Entity\Page;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\Page\AjoutHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Page\AjoutType;

class PageController extends Controller
{
	public function indexAction($id)
	{
		$repositoryLivre = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Livre');
		$livre = $repositoryLivre->find($id);

		$repositoryPage = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Page');
		$pages = $repositoryPage->findBy(array('livre' => $livre));

		return $this->render('TitomePeintrePhilippeLerouxBundle:Page:index.html.twig', array('pages' => $pages));
	}

	/**
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function ajoutAction($livreId)
	{
		$page = new Page($this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Livre')->find($livreId));

		$form = $this->createForm(new AjoutType(), $page);

		$formHandler = new AjoutHandler($form, $this->getRequest(), $this->getDoctrine()->getEntityManager());

		if ($formHandler->process())
		{
			$this->get('session')->setFlash('notice', 
				'Page ajoutée ! Pour arrêter de rajouter des pages au livre cliquer <a href="#">ici</a>');
			return $this->redirect($this->generateUrl('AjoutPage', array('livreId' => $livreId)));
		}

		return $this->render('TitomePeintrePhilippeLerouxBundle:Page:ajout.html.twig', array('form' => $form->createView()));
	}
}