<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloSymfonyController extends AbstractController
{
    /**
     * @Route("/hello/symfony", name="hello_symfony")
     */
    public function index(): Response
    {
        return $this->render('hello_symfony/index.html.twig', [
            'title' => 'hello Symfony!',
            'controller_name' => 'HelloSymfonyController',
        ]);
    }
}
