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
    public function showMyBuy(Request $request, Buy $buy, PoliticoRepository $politicoRepository)
    {
        $form = $this->createForm(BuyType::class, $buy);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('show_my',['id'=>$politicoRepository->getVideo()]);
        }


        return $this->render('buy/myshow.html.twig', [
            'politicos' => $politicoRepository->findAll(),
            'buy' => $buy,
            'form' => $form->createView(),
        ]);
    }







}
