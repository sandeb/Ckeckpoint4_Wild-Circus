<?php

namespace App\Controller;

use App\Entity\Buy;
use App\Entity\User;
use App\Entity\Politico;
use App\Repository\PoliticoRepository;
use App\Repository\BuyRepository;
use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;




class BuyController extends AbstractController
{


    /**
     * @Route("/myshow", name="show_my")
     */
    public function showMyBuy(PoliticoRepository $politicoRepository)
    {

        return $this->render('buy/myshow.html.twig', [
            'politicos' => $politicoRepository->findAll(),

        ]);
    }







}
