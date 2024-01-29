<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:get-data-from-nbp',
    description: 'get current data from nbp',
)]
class GetDataFromNbpCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Pobieranie danych z Narodowego Banku Polskiego')
//            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
//            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
//        $jsonContent = file_get_contents("https://api.nbp.pl/api/exchangerates/tables/A/?format=json");
        $jsonContent = '[{"table":"A","no":"020/A/NBP/2024","effectiveDate":"2024-01-29","rates":[{"c
urrency":"bat (Tajlandia)","code":"THB","mid":0.1134},{"currency":"dolar ameryka
ński","code":"USD","mid":4.0326},{"currency":"dolar australijski","code":"AUD","
mid":2.6618},{"currency":"dolar Hongkongu","code":"HKD","mid":0.5161},{"currency
":"dolar kanadyjski","code":"CAD","mid":3.0015},{"currency":"dolar nowozelandzki
","code":"NZD","mid":2.4658},{"currency":"dolar singapurski","code":"SGD","mid":
3.0065},{"currency":"euro","code":"EUR","mid":4.3653},{"currency":"forint (Węgry
)","code":"HUF","mid":0.011216},{"currency":"frank szwajcarski","code":"CHF","mi
d":4.6785},{"currency":"funt szterling","code":"GBP","mid":5.1230},{"currency":"
hrywna (Ukraina)","code":"UAH","mid":0.1064},{"currency":"jen (Japonia)","code":
"JPY","mid":0.027294},{"currency":"korona czeska","code":"CZK","mid":0.1764},{"c
urrency":"korona duńska","code":"DKK","mid":0.5856},{"currency":"korona islandzk
a","code":"ISK","mid":0.029396},{"currency":"korona norweska","code":"NOK","mid"
:0.3866},{"currency":"korona szwedzka","code":"SEK","mid":0.3848},{"currency":"l
ej rumuński","code":"RON","mid":0.8770},{"currency":"lew (Bułgaria)","code":"BGN
","mid":2.2319},{"currency":"lira turecka","code":"TRY","mid":0.1329},{"currency
":"nowy izraelski szekel","code":"ILS","mid":1.0927},{"currency":"peso chilijski
e","code":"CLP","mid":0.004361},{"currency":"peso filipińskie","code":"PHP","mid
":0.0715},{"currency":"peso meksykańskie","code":"MXN","mid":0.2349},{"currency"
:"rand (Republika Południowej Afryki)","code":"ZAR","mid":0.2146},{"currency":"r
eal (Brazylia)","code":"BRL","mid":0.8201},{"currency":"ringgit (Malezja)","code
":"MYR","mid":0.8518},{"currency":"rupia indonezyjska","code":"IDR","mid":0.0002
5507},{"currency":"rupia indyjska","code":"INR","mid":0.048498},{"currency":"won
 południowokoreański","code":"KRW","mid":0.003017},{"currency":"yuan renminbi (C
hiny)","code":"CNY","mid":0.5615},{"currency":"SDR (MFW)","code":"XDR","mid":5.3
475}]}]';
        
        dd($jsonContent);

        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
