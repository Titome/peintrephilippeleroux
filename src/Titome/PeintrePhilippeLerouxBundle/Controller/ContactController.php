<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Titome\PeintrePhilippeLerouxBundle\Entity\Email;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\Email\EmailHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Email\EmailType;


class ContactController extends Controller
{
	public function indexAction()
	{
		/*$email = new Email;
		$form = $this->createForm(new EmailType(), $email);
		$formHandler = new EmailHandler($form, $this->getRequest());

		if ($formHandler->process())
		{
			$message = \Swift_Message::newInstance()
				->setSubject('Hello Email')
				->setFrom('contact@peintrephilippeleroux.com')
				->setTo('girard.timothee@gmail.com')
				->setBody('Test')
			;
			$this->get('mailer')->send($message);

			$this->get('session')->setFlash('notice', 'Email envoyé !');
			return $this->render('TitomePeintrePhilippeLerouxBundle:Contact:contact.html.twig');
		}*/

		return $this->render('TitomePeintrePhilippeLerouxBundle:Contact:contact.html.twig');
	}

	public function peintreAction()
	{
		$email = new Email;
		$form = $this->createForm(new EmailType(), $email);
		$formHandler = new EmailHandler($form, $this->getRequest(), 'peintre', $this->get('mailer'));

		if ($formHandler->process())
		{
			$this->get('session')->setFlash('notice', 'Email envoyé !');
			return $this->redirect($this->generateUrl('Contact'));
		}

		return $this->render('TitomePeintrePhilippeLerouxBundle:Contact:peintre.html.twig', array('form' => $form->createView()));
	}

	public function gestionnaireAction()
	{
		$email = new Email;
		$form = $this->createForm(new EmailType(), $email);
		$formHandler = new EmailHandler($form, $this->getRequest(), 'gestionnaire', $this->get('mailer'));

		if ($formHandler->process())
		{
			$this->get('session')->setFlash('notice', 'Email envoyé !');
			return $this->redirect($this->generateUrl('Contact'));
		}

		return $this->render('TitomePeintrePhilippeLerouxBundle:Contact:gestionnaire.html.twig', array('form' => $form->createView()));
	}
}
