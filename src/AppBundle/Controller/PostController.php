<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * @Route("/post/{id}")
     * @Method("GET")
     * @Cache(smaxage="15")
     */
    public function indexAction()
    {
        return  (new Response(uniqid()));
    }

    /**
     * @Route("/foshttp")
     * @Method("GET")
     * @Cache(smaxage="5")
     */
    public function fosHttpAction()
    {
        return  (new Response('FOSHTTP: '.uniqid()));
    }

    /**
     * @Route("/comments")
     * @Method("GET")
     */
    public function commentAction()
    {
        return  (new Response('FOSHTTP: '.uniqid()));
    }



}
