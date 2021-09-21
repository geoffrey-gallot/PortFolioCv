<?php

namespace App\Repository;

use App\Entity\CuriculumExp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CuriculumExp|null find($id, $lockMode = null, $lockVersion = null)
 * @method CuriculumExp|null findOneBy(array $criteria, array $orderBy = null)
 * @method CuriculumExp[]    findAll()
 * @method CuriculumExp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CuriculumExpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CuriculumExp::class);
    }

    /**
     * @return CuriculumExp[]
     */
    public function findLastExp()
    {
        return $this->createQueryBuilder('exp')
            ->orderBy('exp.id','DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return CuriculumExp[] Returns an array of CuriculumExp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CuriculumExp
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
