<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController{
    /**
     * @Route("/", name="Welcome")
     */

     public function Welcome(): Response{
         return $this->render("welcome.html.twig", ["appName" => "*** Bienvenue sur ma To Do List ! ***"]);
     }

}