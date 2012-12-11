<?php

namespace Titome\PeintrePhilippeLerouxBundle\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Titome\PeintrePhilippeLerouxBundle\Entity\Image;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\Image\AjoutHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\Image\ModifHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Handler\Image\ModifOrdreHandler;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Image\AjoutType;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Image\ModifType;
use Titome\PeintrePhilippeLerouxBundle\Form\Type\Image\ModifOrdreType;


class ImageController extends Controller
{
    public function galerieAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Image');
        
        $images = $repository->findBy(array(), array('ordre' => 'DESC')); //$repository->listeGalerie();
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Image:galerie.html.twig', array('images' => $images));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function ajoutAction()
    {
        $image = new Image;
        $form = $this->createForm(new AjoutType(), $image);
        
        $formHandler = new AjoutHandler($form, $this->getRequest(), $this->getDoctrine()->getEntityManager());
        
        if ($formHandler->process())
            return $this->redirect($this->generateUrl('Galerie'));
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Image:ajout.html.twig', array('form' => $form->createView()));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function modifAction($id)
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Image');
        $image = $repository->find($id);
        
        $form = $this->createForm(new ModifType(), $image);
        $formHandler = new ModifHandler($form, $this->getRequest(), $this->getDoctrine()->getEntityManager());
        
        if ($formHandler->process())
        {
            $this->get('session')->setFlash('notice', 'Modifications effectuées !');
            return $this->redirect($this->generateUrl('Galerie'));
        }
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Image:modif.html.twig', array('form' => $form->createView()));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $image = $em->getRepository('TitomePeintrePhilippeLerouxBundle:Image')->find($id);
        
        unlink(__DIR__.'/../../../../web/image/'.$image->getNom());
        unlink(__DIR__.'/../../../../web/media/cache/my_thumb/image/'.$image->getNom());
        // Fichier généré que si on clique sur la miniature
        if (file_exists(__DIR__.'/../../../../web/media/cache/img/image/'.$image->getNom()))
            unlink(__DIR__.'/../../../../web/media/cache/img/image/'.$image->getNom());
        
        $em->remove($image);
        $em->flush();
        
        $this->get('session')->setFlash('notice', 'Suppression effectuée !');
        return $this->redirect($this->generateUrl('Galerie'));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function ordreAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Image');
        $images = $repository->findBy(array(), array('ordre' => 'DESC'));
        // TODO : À supprimer. Pour fin de test pour la modification de l'ordre dans la galerie
        //$images = $repository->findBy(array(), array('ordre' => 'asc'), 9 - 3, 3);
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Image:ordre.html.twig', array('images' => $images));
    }
    
    /**
     * @Secure(roles="ROLE_ADMIN")
     */
    public function ordreModifAction($id)
    {
    	$repository = $this->getDoctrine()->getEntityManager()->getRepository('TitomePeintrePhilippeLerouxBundle:Image');
    	$image = $repository->find($id);
        $images = $repository->findBy(array(), array('ordre' => 'DESC'));
    	
    	$form = $this->createForm(new ModifOrdreType, $image);
        $formHandler = 
            new ModifOrdreHandler($form, $this->getRequest(), $this->getDoctrine()->getEntityManager(), $image->getOrdre());
        
        if ($formHandler->process())
        {
            $this->get('session')->setFlash('notice', 'L\'ordre a été modifié avec succès !');
            
            return $this->redirect($this->generateUrl('OrdrePicture'));
        }
        
        return $this->render('TitomePeintrePhilippeLerouxBundle:Image:modifOrdre.html.twig', 
                array('form' => $form->createView(), 'image' => $image, 'images' => $images));
    }
}