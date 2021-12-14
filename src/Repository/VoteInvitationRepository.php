<?php

namespace App\Repository;

use App\Entity\VoteInvitation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VoteInvitation|null find($id, $lockMode = null, $lockVersion = null)
 * @method VoteInvitation|null findOneBy(array $criteria, array $orderBy = null)
 * @method VoteInvitation[]    findAll()
 * @method VoteInvitation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoteInvitationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VoteInvitation::class);
    }

    // /**
    //  * @return VoteInvitation[] Returns an array of VoteInvitation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VoteInvitation
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
