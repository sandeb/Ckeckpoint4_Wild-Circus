<?php

namespace App\Controller;

use App\Entity\Star;
use App\Repository\OwnerRepository;
use App\Repository\StarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="circus")
     */
    public function index()
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/fuck", name="owner")
     */
    public function owner(OwnerRepository $owner)
    {
        $owner = $owner->findAll();

        return $this->render('home/fuck.html.twig',[
            'owners' => $owner
        ]);
    }

    /**
     * @Route("/Star", name="star")
     */
    public function star(StarRepository $star)
    {
        $star = $star->findAll();

        return $this->render('home/star.html.twig',[
            'stars' => $star
        ]);
    }

}
