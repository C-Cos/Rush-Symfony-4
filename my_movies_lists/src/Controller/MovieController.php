<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use aharen\OMDbAPI;
use Twig_Environment;

class MoviesController {
private static $omdb;
    
public static function ApiConnect():Request 
{ 
    return $omdb = new OMDbAPI('54572a00', false, true);
}



}


