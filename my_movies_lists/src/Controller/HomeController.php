<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController
{

    public function index():Response
    {
        $token  = new \Tmdb\ApiToken('2d0f20ce4b63a3992d225fe3751cb1d1');
        $client = new \Tmdb\Client($token);
        $repository = new \Tmdb\Repository\MovieRepository($client);
        $movie      = $repository->load(552);
        return new Response($movie->getTitle());
        //return new Response($this->twig->render('Pages/Home.html.twig'));
    }

}