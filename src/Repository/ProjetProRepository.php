<?php

namespace App\Repository;

use App\Entity\ProjetPro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProjetPro|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjetPro|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjetPro[]    findAll()
 * @method ProjetPro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjetProRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjetPro::class);
    }

    /**
     * @return ProjetPro[]
     */
    public function findLastProjetPro($nbr)
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.id','DESC')
            ->setMaxResults($nbr)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return ProjetPro[] Returns an array of ProjetPro objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProjetPro
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
