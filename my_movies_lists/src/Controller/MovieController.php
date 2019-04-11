<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class MovieController extends AbstractController
{
    /**
     * @Route("/movie/{id}", defaults={"id" = 0}, name="movie")
     * @Method("GET")
     */
    public function index($id)
    {
        $token  = new \Tmdb\ApiToken('2d0f20ce4b63a3992d225fe3751cb1d1');
        $client = new \Tmdb\Client($token);

        $movie = $client->getMoviesApi()->getMovie($id);

        dump($movie);

        return $this->render('movie/index.html.twig', array('movies' => $movie));
            
    }
}
