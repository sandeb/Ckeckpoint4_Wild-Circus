<?php


namespace  App\Service\Cart;


use App\Repository\PoliticoRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


Class CartService {

    protected $session;
    protected $politicoRepository;

    public function __construct(SessionInterface $session, PoliticoRepository $politicoRepository)
    {
        $this->session = $session;
        $this->politicoRepository = $politicoRepository;
    }

    public function add(int $id){

        $cart = $this->session->get('cart',[]);

        if(!empty($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }
        $this->session->set('cart',$cart);
    }

    public function delete(int $id){

        $cart =$this->session->get('cart',[]);

        if(!empty($cart[$id])){
        unset($cart[$id]);
        }

        $this->session->set('cart',$cart);

    }

    public function getFullCart(){
        $cart = $this->session->get('cart',[]);

        $cartWithData = [];

        foreach($cart as $id => $quantity){

            $cartWithData [] =[
                'politico' => $this->politicoRepository->find($id),
                'quantity' => $quantity
            ];
        }
        return $cartWithData;
    }

    public function getTotal() :float {

        $total =0;

        foreach($this->getFullCart() as $item){
            $total += $item['politico']->getPrice() * $item['quantity'];
        }

        return $total;
    }









}