<?php

namespace App\Repository;

use App\Entity\Exchange;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Exchange>
 *
 * @method Exchange|null find($id, $lockMode = null, $lockVersion = null)
 * @method Exchange|null findOneBy(array $criteria, array $orderBy = null)
 * @method Exchange[]    findAll()
 * @method Exchange[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExchangeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Exchange::class);
    }

    public function findNew(): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT *
            FROM exchange e
            ORDER BY e.created_at DESC
            LIMIT 1'
            ;

        $resultSet = $conn->executeQuery($sql);
        return $resultSet->fetchAllAssociative();
    }

//    /**
//     * @return Exchange[] Returns an array of Exchange objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Exchange
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
