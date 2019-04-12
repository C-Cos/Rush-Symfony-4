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

        //////// get input text//////////
        $search = $request->request->get('search');

        //////// search by movie title //////////
        $result = $client->getSearchApi()->searchMovies($search);

        //////// search by actor (2 parts) //////////
        $actor = $client->getSearchApi()->searchPersons($search);
    
        ////////////////// find genre id//////////////
        $genres = $client->getGenresApi()->getGenres();
        $array = [];

        for($i = 0; $i <= 34; $i ++){
            $id = $genres['genres'][$i]['id'];
            $name = $genres['genres'][$i]['name'];
            $array[strtolower($name)] = $id;
        }
        $lower = strtolower($search);
        dump($array);

        if (array_key_exists($lower , $array)) {
            $var = $array[$lower];
        }
        dump($var);

        ////////////////// find movie by genre id//////////////
        $genres = $client->getGenresApi()->getGenres();
        $response = $client->getDiscoverApi()->discoverMovies([
            'page' => 1,
            'with_genres' => $var
        ]);

        dump($response);
        
        
        return $this->render('search/index.html.twig', 
        ['movies' => $result, 'result' => $search, 'actors' => $actor, 'genres' => $response]);
        
    }

    
}
