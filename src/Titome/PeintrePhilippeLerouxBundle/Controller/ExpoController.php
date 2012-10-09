<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\Expo\AjoutHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Expo\AjoutType;

class ExpoController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Expo');
        $expo = $repository->find(1);
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Expo:expo.html.twig', array('expo' => $expo));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function ajoutAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Expo');
        $expo = $repository->find(1);
        $form = $this->createForm(new AjoutType(), $expo);
        $formHandler = new AjoutHandler($form, $this->getRequest(), $this->getDoctrine()->getEntityManager());

        if ($formHandler->process())
            return $this->redirect($this->generateUrl('Expo'));

        return $this->render('TitomePeintrePhilippeLerouxBundle:Expo:ajout.html.twig', array('form' => $form->createView()));
    }
}