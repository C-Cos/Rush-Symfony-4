<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class MovieDetailsController extends AbstractController
{
    /**
     * @Route("/movie/details{id}", defaults={"id" = 0}, name="movie_details")
     * @Method("GET")
     */
    public function index($id)
    {
        $token  = new \Tmdb\ApiToken('2d0f20ce4b63a3992d225fe3751cb1d1');
        $client = new \Tmdb\Client($token);

        $movie = $client->getMoviesApi()->getMovie($id);

        dump($movie);

        return $this->render('movie_details/index.html.twig', array('movies' => $movie));
            
    }
}

