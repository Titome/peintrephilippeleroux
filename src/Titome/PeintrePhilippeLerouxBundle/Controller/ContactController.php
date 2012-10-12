<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
	public function indexAction()
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
	}
}