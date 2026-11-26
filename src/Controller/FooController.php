<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Repository\ReservationRepository;

final class FooController extends AbstractController
{
    #[Route('/foo', name: 'app_foo')]
    public function index(ReservationRepository $reservationRepository): Response
    {
        return $this->render('foo/index.html.twig', [
            'controller_name' => 'FooController',
            'resas' => $reservationRepository->findAll(),
        ]);
    }
}
