<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Handler\Email;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Titome\PeintrePhilippeLerouxBundle\Entity\Email;

class EmailHandler
{
	protected $form;
	protected $request;
	protected $user;
	protected $email;
	protected $mailer;
	protected $adresse;
	protected $adressePeintre = 'girard.timothee@gmail.com';//'leroux.philippe@bbox.fr';
	protected $adresseGestionnaire = 'girard.timothee@gmail.com';

	public function __construct(Form $form, Request $request, $user, $mailer)
	{
		$this->form    = $form;
		$this->request = $request;
		$this->user    = $user;
		$this->mailer  = $mailer;
		$this->email   = new Email;
	}

	public function process()
	{
		if ($this->request->getMethod() == 'POST')
		{
			$this->form->bindRequest($this->request);

			if ($this->form->isValid())
			{
				$this->onSucess($this->form->getData());

				return true;
			}
		}

		return false;
	}

	public function onSucess(Email $email)
	{
		if ($this->user == 'peintre')
			$this->adresse = $this->adressePeintre;
		elseif ($this->user == 'gestionnaire')
			$this->adresse = $this->adresseGestionnaire;

		$corpsMessage = $email->getMessage().' de '.$email->getNom().' ('.$email->getEmail().')';

		$message = \Swift_Message::newInstance()
			->setSubject('Un nouveau message sur le site peintrephilippeleroux.com !')
			->setFrom('contact@peintrephilippeleroux.com')
			->setTo($this->adresse)
			->setBody($corpsMessage)
		;
		$this->mailer->send($message);
	}
}