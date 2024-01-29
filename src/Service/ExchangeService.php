<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

class ExchangeService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function insertJson(string $jsonContent, \DateTimeImmutable $createdAt)
    {
        $em = $this->entityManager;

        $query = "INSERT INTO exchange (json, created_at)
                    VALUES(:json, :created_at)";

        $stmt = $em->getConnection()->prepare($query);
        $r = $stmt->execute(array(
            'json' => $jsonContent,
            'created_at' => $createdAt->format('Y-m-d H:i:s'),
        ));
    }
}