<?php

namespace App\Controller;

use App\Repository\DeliveryDrinkRepository;
use App\Repository\DeliveryKitRepository;
use App\Repository\DeliveryPizzaRepository;
use App\Repository\DeliveryRollRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/', name: 'menu')]
    public function index(): Response
    {
        return $this->render('/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    /**
     * @Route("/delivery/list", name="foodList")
     */
    public function foodList(DeliveryPizzaRepository $pizzaRepository,
                              DeliveryDrinkRepository $drinkRepository,
                              DeliveryRollRepository $rollRepository,
                             DeliveryKitRepository $kitRepository) : Response {
        $pizzas = $pizzaRepository->findAll();
        $drinks = $drinkRepository->findAll();
        $rolls = $rollRepository->findAll();
        $kits = $kitRepository->findAll();

        return $this->render('/index.html.twig', [
            'title'=> 'Еда',
            'pizzas'=> $pizzas,
            'drinks'=>$drinks,
            'rolls'=>$rolls,
            'kits' => $kits
        ]);
    }


}
