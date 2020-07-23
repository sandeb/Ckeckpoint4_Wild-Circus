<?php

namespace App\Controller;

use App\Repository\PoliticoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PoliticoController extends AbstractController
{
    /**
     * @Route("/show", name="show")
     */
    public function index(PoliticoRepository $politicoRepository)
    {
        return $this->render('politico/index.html.twig', [
            'politicos' => $politicoRepository->findAll()
        ]);
    }


}
