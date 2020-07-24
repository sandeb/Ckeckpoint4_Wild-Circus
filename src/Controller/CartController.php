<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Entity\Politico;
use App\Repository\PoliticoRepository;
use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function index(CartService $cartService)
    {
        $cartWithData =$cartService->getFullCart();

        $total =$cartService->getTotal();


        return $this->render('cart/index.html.twig', [
            'items' => $cartWithData,
            'total' => $total
        ]);

    }

    /**
     * @Route("/cart/add/{id}", name="cart_add")
     */
    public function add($id,CartService $cartService)
    {
        $cartService->add($id);

        return $this->redirectToRoute('show');
    }

    /**
     * @Route("/cart/delete/{id}", name="cart_delete")
     *
     */
    public function delete($id, CartService $cartService)
    {
        $cartService->delete($id);

        return $this->redirectToRoute("cart");
    }

}





