<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Message;
use AppBundle\Form\MessageType;
use AppBundle\Entity\AnonymousMessage;
use AppBundle\Form\AnonymousMessageType;

use AppBundle\Entity\User;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $message = new Message();
        $messageForm = $this->createForm(new MessageType(), $message);
        $messageForm->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $messages = $em->getRepository(Message::class)
            ->findBy([], ['createdAt' => 'DESC']);

        if ($messageForm->isSubmitted() && $messageForm->isValid()) {
            

            $em->persist($message);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render(
            'default/home.html.twig',
            array(
                'messageForm' => $messageForm->createView(),
                'messages' => $messages
            )
        );

        // replace this example code with whatever you need
        // return $this->render('default/index.html.twig', array(
        //     'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        // ));
    }

    /**
     * @Route("/u/{username}", name="anonymous_message")
     */
    public function anonymouseMessageAction(Request $request, $username)
    {
        $message = new AnonymousMessage();
        $messageForm = $this->createForm(new AnonymousMessageType(), $message);
        $messageForm->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)
            ->findOneByUsername($username);
        if (!$user) {
            throw $this->createNotFoundException();
        }

        if ($messageForm->isSubmitted() && $messageForm->isValid()) {
            $message->setUser($user);
            $em->persist($message);
            $em->flush();

            return $this->redirectToRoute('anonymous_message', array('username' => $username));
        }

        return $this->render(
            'default/anonymous.html.twig',
            array(
                'messageForm' => $messageForm->createView(),
                'user' => $user
            )
        );
    }

}
