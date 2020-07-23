<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PoliticoController extends AbstractController
{
    /**
     * @Route("/show", name="show")
     */
    public function index()
    {
        return $this->render('politico/index.html.twig', [
            'controller_name' => 'PoliticoController',
        ]);
    }
}
