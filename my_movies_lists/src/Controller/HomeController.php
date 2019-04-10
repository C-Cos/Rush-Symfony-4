<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
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
        /* $repository = new \Tmdb\Repository\MovieRepository($client);
        $movie      = $repository->load(552); */

        $configRepository = new \Tmdb\Repository\ConfigurationRepository($client);
        $config = $configRepository->load();

        $imageHelper = new \Tmdb\Helper\ImageHelper($config);
        $images = $client->getMoviesApi()->getImages(550);
        //$imageHelper->getHtml($images, 'w154', 154, 80);

        
        return new Response($this->twig->render('Pages/Home.html.twig'));
        //return new Response($this->twig->render('Pages/Home.html.twig'));
    }

}