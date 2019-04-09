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
        $movie = $client->getMoviesApi()->getMovie(550);
        return new Response(var_dump($movie));
        //return new Response($this->twig->render('Pages/Home.html.twig'));
    }

}