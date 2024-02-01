<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

class CurrencyService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function insertCurrency(string $currency, string $code, float $mid, string $effectiveDate)
    {
        $em = $this->entityManager;

        $query = "INSERT INTO currency (currency, code, mid, import_at)
                    VALUES(:currency, :code, :mid, :import_at)";

        $stmt = $em->getConnection()->prepare($query);
        $r = $stmt->execute(array(
            'currency' => $currency,
            'code' => $code,
            'mid' => $mid,
            'import_at' => $effectiveDate,
        ));
    }
}