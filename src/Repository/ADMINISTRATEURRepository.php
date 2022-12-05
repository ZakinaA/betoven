<?php

namespace App\Repository;

use App\Entity\ADMINISTRATEUR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ADMINISTRATEUR>
 *
 * @method ADMINISTRATEUR|null find($id, $lockMode = null, $lockVersion = null)
 * @method ADMINISTRATEUR|null findOneBy(array $criteria, array $orderBy = null)
 * @method ADMINISTRATEUR[]    findAll()
 * @method ADMINISTRATEUR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ADMINISTRATEURRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ADMINISTRATEUR::class);
    }

    public function save(ADMINISTRATEUR $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ADMINISTRATEUR $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ADMINISTRATEUR[] Returns an array of ADMINISTRATEUR objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ADMINISTRATEUR
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
