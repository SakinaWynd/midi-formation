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

    /**
    * @Route("/edit/{id}", methods={"POST"}, name="editPosts")
    */
    public function editAction($id){
        return  (new Response(sprintf('Article %s updates', $id)));
    }

    /**
    * @Route("/post/{id}", name="show")
     * @Cache(smaxage="86400")
     */
    public function showAction($id){
        return  (new Response(sprintf('Show Article id = %s à %s', $id, (new \DateTime())->format('H:m:s'))));
    }

    /**
    * @Route("/posts", name="list")
    * @Cache(smaxage="86400")
    **/
    public function listAction(){
        return  (new Response(sprintf('List des artcles à %s', (new \DateTime())->format('H:m:s'))));

    }



}
