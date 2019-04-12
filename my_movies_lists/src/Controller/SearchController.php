<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function search(Request $request): Response
    {
        $token  = new \Tmdb\ApiToken('2d0f20ce4b63a3992d225fe3751cb1d1');
        $client = new \Tmdb\Client($token);

        $search = $request->request->get('search');
        $result = $client->getSearchApi()->searchMovies($search);
        $actor = $client->getSearchApi()->searchPersons($search);

        dump($actor);

        return $this->render('search/index.html.twig', ['movies' => $result, 'result' => $search, 'actors' => $actor]);
        
    }

    
}
