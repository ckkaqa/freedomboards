<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * @Route("/app/journal")
 */
class JournalController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {

        return $this->render('UserBundle:Journal:index.html.twig', array(
            
        ));
    }

    /**
     * @Route("/new")
     */
    public function newAction()
    {
        return $this->render('UserBundle:Journal:new.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/show")
     */
    public function showAction()
    {
        return $this->render('UserBundle:Journal:show.html.twig', array(
            // ...
        ));
    }

}
