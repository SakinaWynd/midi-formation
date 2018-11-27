<?php

use Symfony\Bundle\FrameworkBundle\HttpCache\HttpCache;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class AppCache extends HttpCache
{
    protected function invalidate(Request  $request, $catch = false){

        if('DELETE' !== $request->getMethod()){
            return parent::invalidate($request, $catch);
        }

        if('192.168.99.100' !== $request->getClientIp()){
            return new Response('Invalide http method', Response::HTTP_BAD_REQUEST);
        }
        $response = new Response();

        if($this->getStore()->purge($request->getUri())){
            $response->setStatusCode(Response::HTTP_OK, 'purged');
        }else{
            $response->setStatusCode(Response::HTTP_NOT_FOUND, 'Not found');
        }

        return $response;

    }
}
