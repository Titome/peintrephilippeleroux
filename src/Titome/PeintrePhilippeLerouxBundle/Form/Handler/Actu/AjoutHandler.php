<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Handler\Actu;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Titome\PeintrePhilippeLerouxBundle\Entity\Actu;

class AjoutHandler
{
	protected $form;
	protected $request;
	protected $em;
	protected $actu;

	public function __construct(Form $form, Request $request, EntityManager $em)
	{
		$this->form    = $form;
		$this->request = $request;
		$this->em 	   = $em;
		$this->actu    = new Actu;
	}

	public function process()
	{
		if ($this->request->getMethod() == 'POST')
		{
			$this->form->bindRequest($this->request);

			if ($this->form->isValid())
			{
				$this->onSuccess($this->form->getData());

				return true;
			}
		}

		return false;
	}

	public function onSuccess(Actu $actu)
	{
		$this->em->persist($actu);
		$this->em->flush();
	}
}