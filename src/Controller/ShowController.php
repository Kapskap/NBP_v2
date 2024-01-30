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
////        $exchange = $exchangeRepository->findBy([], ['createdAt' => 'DESC'],['limit' => 1]);
        $exchange = $exchangeRepository->find(1);
//        $jsonContent = $exchange->getJson();
        $date = $exchange->getCreatedAt();

        //pełny
        $jsonContent = '[{"table":"A","no":"020/A/NBP/2024","effectiveDate":"2024-01-29","rates":[{"currency":"bat (Tajlandia)","code":"THB","mid":0.1134},{"currency":"dolar amerykański","code":"USD","mid":4.0326},{"currency":"dolar australijski","code":"AUD","mid":2.6618},{"currency":"dolar Hongkongu","code":"HKD","mid":0.5161},{"currency":"dolar kanadyjski","code":"CAD","mid":3.0015},{"currency":"dolar nowozelandzki","code":"NZD","mid":2.4658},{"currency":"dolar singapurski","code":"SGD","mid":3.0065},{"currency":"euro","code":"EUR","mid":4.3653},{"currency":"forint (Węgry)","code":"HUF","mid":0.011216},{"currency":"frank szwajcarski","code":"CHF","mid":4.6785},{"currency":"funt szterling","code":"GBP","mid":5.1230},{"currency":"hrywna (Ukraina)","code":"UAH","mid":0.1064},{"currency":"jen (Japonia)","code":"JPY","mid":0.027294},{"currency":"korona czeska","code":"CZK","mid":0.1764},{"currency":"korona duńska","code":"DKK","mid":0.5856},{"currency":"korona islandzka","code":"ISK","mid":0.029396},{"currency":"korona norweska","code":"NOK","mid":0.3866},{"currency":"korona szwedzka","code":"SEK","mid":0.3848},{"currency":"lej rumuński","code":"RON","mid":0.8770},{"currency":"lew (Bułgaria)","code":"BGN","mid":2.2319},{"currency":"lira turecka","code":"TRY","mid":0.1329},{"currency":"nowy izraelski szekel","code":"ILS","mid":1.0927},{"currency":"peso chilijskie","code":"CLP","mid":0.004361},{"currency":"peso filipińskie","code":"PHP","mid":0.0715},{"currency":"peso meksykańskie","code":"MXN","mid":0.2349},{"currency":"rand (Republika Południowej Afryki)","code":"ZAR","mid":0.2146},{"currency":"real (Brazylia)","code":"BRL","mid":0.8201},{"currency":"ringgit (Malezja)","code":"MYR","mid":0.8518},{"currency":"rupia indonezyjska","code":"IDR","mid":0.00025507},{"currency":"rupia indyjska","code":"INR","mid":0.048498},{"currency":"won południowokoreański","code":"KRW","mid":0.003017},{"currency":"yuan renminbi (Chiny)","code":"CNY","mid":0.5615},{"currency":"SDR (MFW)","code":"XDR","mid":5.3475}]}]';
        //okrojony
//        $jsonContent = '[{"currency":"bat (Tajlandia)","code":"THB","mid":0.1134},{"currency":"dolar amerykański","code":"USD","mid":4.0326},{"currency":"dolar australijski","code":"AUD","mid":2.6618},{"currency":"dolar Hongkongu","code":"HKD","mid":0.5161},{"currency":"dolar kanadyjski","code":"CAD","mid":3.0015},{"currency":"dolar nowozelandzki","code":"NZD","mid":2.4658},{"currency":"dolar singapurski","code":"SGD","mid":3.0065},{"currency":"euro","code":"EUR","mid":4.3653},{"currency":"forint (Węgry)","code":"HUF","mid":0.011216},{"currency":"frank szwajcarski","code":"CHF","mid":4.6785},{"currency":"funt szterling","code":"GBP","mid":5.1230},{"currency":"hrywna (Ukraina)","code":"UAH","mid":0.1064},{"currency":"jen (Japonia)","code":"JPY","mid":0.027294},{"currency":"korona czeska","code":"CZK","mid":0.1764},{"currency":"korona duńska","code":"DKK","mid":0.5856},{"currency":"korona islandzka","code":"ISK","mid":0.029396},{"currency":"korona norweska","code":"NOK","mid":0.3866},{"currency":"korona szwedzka","code":"SEK","mid":0.3848},{"currency":"lej rumuński","code":"RON","mid":0.8770},{"currency":"lew (Bułgaria)","code":"BGN","mid":2.2319},{"currency":"lira turecka","code":"TRY","mid":0.1329},{"currency":"nowy izraelski szekel","code":"ILS","mid":1.0927},{"currency":"peso chilijskie","code":"CLP","mid":0.004361},{"currency":"peso filipińskie","code":"PHP","mid":0.0715},{"currency":"peso meksykańskie","code":"MXN","mid":0.2349},{"currency":"rand (Republika Południowej Afryki)","code":"ZAR","mid":0.2146},{"currency":"real (Brazylia)","code":"BRL","mid":0.8201},{"currency":"ringgit (Malezja)","code":"MYR","mid":0.8518},{"currency":"rupia indonezyjska","code":"IDR","mid":0.00025507},{"currency":"rupia indyjska","code":"INR","mid":0.048498},{"currency":"won południowokoreański","code":"KRW","mid":0.003017},{"currency":"yuan renminbi (Chiny)","code":"CNY","mid":0.5615},{"currency":"SDR (MFW)","code":"XDR","mid":5.3475}]';

//        $serializer = new Serializer(
//            [new GetSetMethodNormalizer(), new ArrayDenormalizer()],
//            [new JsonEncoder()]
//        );

//        $data = $serializer->deserialize($jsonContent, Data::class, 'json');
        $data = json_decode($jsonContent, true);
//        dd($data);

        return $this->render('show.html.twig', ['json' => $data, 'date' => $date]);

//        return $this->render('show.html.twig', ['json' => $jsonContent, 'date' => $date]);
    }
}