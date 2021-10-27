<?php

namespace App\Repository;

use App\Entity\DeliveryPizzaInKit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DeliveryPizzaInKit|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeliveryPizzaInKit|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeliveryPizzaInKit[]    findAll()
 * @method DeliveryPizzaInKit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeliveryPizzaInKitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeliveryPizzaInKit::class);
    }

    // /**
    //  * @return DeliveryPizzaInKit[] Returns an array of DeliveryPizzaInKit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DeliveryPizzaInKit
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
