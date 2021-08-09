<?php

namespace App\Repository;

use App\Entity\ServiceBudget;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServiceBudget|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceBudget|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceBudget[]    findAll()
 * @method ServiceBudget[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceBudgetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceBudget::class);
    }

    // /**
    //  * @return ServiceBudget[] Returns an array of ServiceBudget objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ServiceBudget
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
