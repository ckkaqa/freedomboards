<?php

namespace UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Controller\RegistrationController as BaseController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RegistrationController extends BaseController
{
    /**
     * @param Request $request
     *
     * @Route("/register")
     * @return Response
     */
    public function registerAction(Request $request)
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('user_default_index');
        }

        die('www');
        $response = parent::registerAction($request);

        return $response;
    }

}