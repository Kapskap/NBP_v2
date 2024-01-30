<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Exchange;
use App\Repository\ExchangeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShowController extends AbstractController
{
    #[Route('/show', name: 'app_show')]
    public function showExchange(EntityManagerInterface $entityManager, int $id=null): Response
    {
        $exchangeRepository = $entityManager->getRepository(Exchange::class);
//        $exchange = $exchangeRepository->findBy([], ['createdAt' => 'DESC'],['limit' => 1]);
        $exchange = $exchangeRepository->find(1);
        $jsonContent = $exchange->getJson();
        $date = $exchange->getCreatedAt();
//        dd($jsonContent);


        return $this->render('show.html.twig', ['json' => $jsonContent, 'date' => $date]);
    }
}