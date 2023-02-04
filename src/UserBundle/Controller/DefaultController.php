<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\AnonymousMessage;

/**
 * @Route("/app")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     */ 
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $anonymousMessages = $em->getRepository(AnonymousMessage::class)
            ->findBy(array('user' => $this->getUser()), array('createdAt' => 'DESC'));


        return $this->render('UserBundle:Default:index.html.twig', array(
            'anonymous_messages' => $anonymousMessages,
            'user' => $this->getUser()
        ));
    }
}
