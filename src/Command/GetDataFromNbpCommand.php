<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\ExchangeService;

#[AsCommand(
    name: 'app:get-data-from-nbp',
    description: 'get current data from nbp',
)]
class GetDataFromNbpCommand extends Command
{

    public function __construct(private ExchangeService $exchangeService)
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

        $createdAt = new \DateTimeImmutable();

        if ($jsonContent != NULL){
            $this->exchangeService->insertJson($jsonContent, $createdAt);
            $io->note(sprintf('Operacja zakończona powodzeniem'));
        }
        else{
            $io->note(sprintf('Operacja zakończona niepowodzeniem !'));
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
