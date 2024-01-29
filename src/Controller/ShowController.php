<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Exchange;
use App\Repository\ExchangeRepository;
use Doctrine\ORM\EntityManagerInterface;

class ShowController
{
    #[Route('/show', name: 'app_show')]
    public function showExchange(): Response
    {
        return new Response(
            '<html><body>Kurs wymiany walut</body></html>'
        );
    }
}