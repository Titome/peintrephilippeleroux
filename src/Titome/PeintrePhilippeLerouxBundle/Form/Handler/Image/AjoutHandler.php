<?php

namespace Titome\PeintrePhilippeLerouxBundle\Form\Handler\Image;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Titome\PeintrePhilippeLerouxBundle\Entity\Image;

class AjoutHandler
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
        $nom = uniqid().'-'.$image->getFile()->getClientOriginalName();
        
        $image->setNom($nom);
        $image->getFile()->move(__DIR__.'/../../../../../../web/image', $nom);
        
        $query = $this->em->createQuery('SELECT COUNT(i.id) FROM Titome\PeintrePhilippeLerouxBundle\Entity\Image i');
        $image->setOrdre($query->getSingleScalarResult() + 1);
        
        $this->em->persist($image);
        $this->em->flush();
    }
}