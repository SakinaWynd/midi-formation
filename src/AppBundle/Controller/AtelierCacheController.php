<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AtelierCacheController extends Controller
{

    public function uniqIdAction(Request $request)
    {
        return (new Response(uniqid()))->setSharedMaxAge(200);
    }
    /**
     * @Route("/home", name="homepage")
     */
    public function randomArticleAction(Request $request)
    {
        return (new Response(
                sprintf(
                'version %s généré à %s',
                $request->headers->get('X-Version'),
                date('H:i:s')
            )))
            ->setSharedMaxAge(60)
            ->setVary('X-Version');
    }

    public function lastArticleAction(Request $request)
    {
        return (new Response(uniqid()))->setSharedMaxAge(86400);
    }

}
