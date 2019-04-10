<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;


class UserController
{

    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    } 

    /**
     * @Route("/login", name="login")
     * 
     */
    public function index():Response
    {
   
        return new Response("Connexion");
        //return new Response($this->twig->render('Pages/Login.html.twig')));
    }

}