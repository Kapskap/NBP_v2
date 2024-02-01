<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Exchange;
use App\Repository\ExchangeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\Model\Data;

class ShowController extends AbstractController
{
    #[Route('/show', name: 'app_show')]
    public function showExchange(EntityManagerInterface $entityManager, int $id=null): Response
    {
        $exchangeRepository = $entityManager->getRepository(Exchange::class);
        $exchange = $exchangeRepository->find(4);
        $jsonContent = $exchange->getJson();

//        $exchange = $exchangeRepository->findBy([], ['createdAt' => 'DESC'],['limit' => 1]);

//        $jsonContent2 = $entityManager->getRepository(Exchange::class)->findNew();

//dd($jsonContent, $exchange[0], $jsonContent2[0]);

//        $serializer = new Serializer(
//            [new GetSetMethodNormalizer(), new ArrayDenormalizer()],
//            [new JsonEncoder()]
//        );

//        $data = $serializer->deserialize($jsonContent, Data::class, 'json');

//        $data = json_decode($jsonContent, true);

        foreach ($jsonContent as $tablica){
            $effectiveDate = $tablica['effectiveDate'];
            $rates = $tablica['rates'];
        }

        return $this->render('show.html.twig', ['rates' => $rates, 'effectiveDate' => $effectiveDate]);
    }
}