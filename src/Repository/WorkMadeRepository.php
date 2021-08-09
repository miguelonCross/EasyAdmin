<?php

namespace App\Repository;

use App\Entity\WorkMade;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WorkMade|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorkMade|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorkMade[]    findAll()
 * @method WorkMade[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkMadeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkMade::class);
    }

    // /**
    //  * @return WorkMade[] Returns an array of WorkMade objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WorkMade
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
