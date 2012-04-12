<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Handler;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Titome\PeintrePhilippeLerouxBundle\Entity\Image;

class ImageHandler
{
    protected $form;
    protected $request;
    protected $em;
    protected $image;
    
    
    public function __construct(Form $form, Request $request, EntityManager $em)
    {
        $this->form    = $form;
        $this->request = $request;
        $this->em      = $em;
        $this->image   = new Image;
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
    
    public function onSuccess(Image $image)
    {
        $nom = uniqid().'-'.$image->file->getClientOriginalName();
        
        $image->setNom($nom);
        $image->file->move(__DIR__.'/../../../../../web/image', $nom);
        
        $this->em->persist($image);
        $this->em->flush();
    }
}