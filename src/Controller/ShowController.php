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
    #[Route('/', name: 'app_show')]
    public function showExchange(EntityManagerInterface $entityManager, int $id=null): Response
    {
        //wyciągnięcie danych z find
        $exchangeRepository = $entityManager->getRepository(Exchange::class);
        $exchange = $exchangeRepository->find(1);
        $jsonContent = $exchange->getJson();
        $jsonContent1 = $jsonContent[0];

        //wyciągnięcie danych z obiektów
        $exchange = $exchangeRepository->findBy([], ['createdAt' => 'DESC'],['LIMIT => 1']);
        $jsonContent2=$exchange[0]->getJson()[0];

        //wyciągnięcie danych z zapytania SQL
        $jsonContent3 = $entityManager->getRepository(Exchange::class)->findNew();
        $jsonContent3 = ($jsonContent3[0]['json']);

//        dd( $jsonContent1, $jsonContent2, $jsonContent3);


//        $data = json_decode($jsonContent3, true);

        $effectiveDate = $jsonContent2['effectiveDate'];

        return $this->render('show.html.twig', ['rates' => $jsonContent2, 'effectiveDate' => $effectiveDate]);
    }
}