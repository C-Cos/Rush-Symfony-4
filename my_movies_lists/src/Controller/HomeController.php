<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController
{
    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    } 


    public function index():Response
    {
        $token  = new \Tmdb\ApiToken('2d0f20ce4b63a3992d225fe3751cb1d1');
        $client = new \Tmdb\Client($token);
        
        $movies = $client->getMoviesApi()->getPopular();
        /* $repository = new \Tmdb\Repository\MovieRepository($client);
        $movies = $repository->getTopRated(array('page' => 1)); */
        
        dump($movies);
        //return new Response($this->twig->render('Pages/Home.html.twig'));
        return new Response($this->twig->render('Pages/Home.html.twig', array('movies' => $movies)));

    }
}