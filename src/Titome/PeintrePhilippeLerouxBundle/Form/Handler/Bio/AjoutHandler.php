<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Handler\Bio;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Titome\PeintrePhilippeLerouxBundle\Entity\Bio;

class AjoutHandler
{
    protected $form;
    protected $request;
    protected $em;
    protected $bio;
    
    public function __construct(Form $form, Request $request, EntityManager $em)
    {
        $this->form    = $form;
        $this->request = $request;
        $this->em      = $em;
        $this->bio     = new Bio;
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
    
    public function onSuccess(Bio $bio)
    {
        $this->em->persist($bio);
        $this->em->flush();
    }
}