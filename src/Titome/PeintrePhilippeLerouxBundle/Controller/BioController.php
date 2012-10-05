<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\Bio\AjoutHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Bio\AjoutType;

class BioController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Bio');
        $bio = $repository->find(1);
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Bio:bio.html.twig', array('bio' => $bio));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function ajoutAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Bio');
        $bio = $repository->find(1);
        $form = $this->createForm(new AjoutType(), $bio);
        $formHandler = new AjoutHandler($form, $this->getRequest(), $this->getDoctrine()->getEntityManager());
        
        if ($formHandler->process())
            return $this->redirect($this->generateUrl('Bio'));
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Bio:ajout.html.twig', array('form' => $form->createView()));
    }
}