<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//TODO : supprimer pour nettoyage
//use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Image');
        
        $images = $repository->findAll();
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Default:index.html.twig', array('images' => $images));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function adminAction()
    {
        return $this->render('TitomePeintrePhilippeLerouxBundle:Admin:index.html.twig');
    }
    
    // Méthode pour intervertir 2 champs dans la bdd
    //TODO : supprimer pour nettoyage
    /*public function interAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('TitomePeintrePhilippeLerouxBundle:Image');
        $images = $repository->findAll();
        
        foreach ($images as $image)
        {
            $inter = $image->getTitre();
            $image->setTitre($image->getLegende());
            $image->setLegende($inter);
            $em->persist($image);
        }
        
        $em->flush();
        
        return new Response("Conversition faite !");
    }*/
}