<?php

namespace App\Controller;

use App\Entity\Currency;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowCurrencyController extends AbstractController
{
    #[Route('/show/currency', name: 'app_show_currency')]
    public function showCurrency(EntityManagerInterface $entityManager): Response
    {
        $currencyRepository = $entityManager->getRepository(Currency::class);
        $currency = $currencyRepository->findBy([], ['importAt' => 'DESC']);
//dd($currency);
        return $this->render('show_currency.html.twig', [
            'currencies' => $currency,
        ]);
    }
}
