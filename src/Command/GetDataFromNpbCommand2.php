<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\CurrencyService;

#[AsCommand(
    name: 'app:get-data-from-nbp2',
    description: 'get current data from nbp',
)]
class GetDataFromNpbCommand2 extends Command
{

    public function __construct(private CurrencyService $exchangeService)
    {
        parent::__construct();
    }
    protected function configure(): void
    {
        $this
            ->setDescription('Pobieranie danych z Narodowego Banku Polskiego')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $jsonContent = file_get_contents("https://api.nbp.pl/api/exchangerates/tables/A/?format=json");

        if ($jsonContent != NULL) {
            $data = json_decode($jsonContent, true);

            foreach ($data as $array) {
                $effectiveDate = $array['effectiveDate'];
                $rates = $array['rates'];
            }

            //        dd($effectiveDate, $rates);

            foreach ($rates as $rate) {
                $currency = $rate['currency'];
                $code = $rate['code'];
                $mid = $rate['mid'];
 //               dd($effectiveDate);
                $this->exchangeService->insertCurrency($currency, $code, $mid, $effectiveDate);
            }
            $io->note(sprintf('Operacja zakończona powodzeniem'));
        }
        else{
            $io->note(sprintf('Operacja zakończona niepowodzeniem !'));
        }


        $io->success('Operacja zakończona.');

        return Command::SUCCESS;
    }
}
