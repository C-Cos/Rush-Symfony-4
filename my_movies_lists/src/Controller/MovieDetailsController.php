<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class MovieDetailsController extends AbstractController
{
    /**
     * @Route("/movies/details{id}", defaults={"id" = 0}, name="movies_details")
     * @Method("GET")
     */
    public function index($id)
    {
        $token  = new \Tmdb\ApiToken('2d0f20ce4b63a3992d225fe3751cb1d1');
        $client = new \Tmdb\Client($token);

        $movie = $client->getMoviesApi()->getMovie($id);

        dump($movie);

        return $this->render('movie_details/index.html.twig', array('movies' => $movie));
        $person = $client->getPeopleApi()->getPerson(33);
      
    }

    /**
     * @Route("/actor/details{id}", defaults={"id" = 0}, name="actor_details")
     * @Method("GET")
     */
    public function actorDetails($id)
    {
        $token  = new \Tmdb\ApiToken('2d0f20ce4b63a3992d225fe3751cb1d1');
        $client = new \Tmdb\Client($token);

        $credits = $client->getMoviesApi()->getCredits(87421);
        dump($credits);
        
        $person = $client->getPeopleApi()->getPerson($id);

        dump($person); 

        return $this->render('movie_details/index.html.twig', array('movies' => $movie));
     
    }


}

