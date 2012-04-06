<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Titome\PeintrePhilippeLerouxBundle\Entity\Image;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\ImageHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\ImageType;


class ImageController extends Controller
{
    public function ajoutAction()
    {
        $image = new Image;
        $form = $this->createForm(new ImageType(), $image);
        
        $formHandler = new ImageHandler($form, $this->getRequest(), $this->getDoctrine()->getEntityManager());
        
        if ($formHandler->process())
            return $this->redirect($this->generateUrl($route));
        
        return $this->;
    }
}