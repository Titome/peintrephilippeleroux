<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Handler\Livre;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Titome\PeintrePhilippeLerouxBundle\Entity\Livre;

class ModifHandler
{
    protected $form;
    protected $request;
    protected $em;
    
    
    public function __construct(Form $form, Request $request, EntityManager $em)
    {
        $this->form    = $form;
        $this->request = $request;
        $this->em      = $em;
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
    
    public function onSuccess(Livre $livre)
    {
        $this->em->persist($livre);
        $this->em->flush();
    }
}