<?php

namespace App\Repository;

use App\Entity\Eleve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Eleve>
 *
 * @method Eleve|null find($id, $lockMode = null, $lockVersion = null)
 * @method Eleve|null findOneBy(array $criteria, array $orderBy = null)
 * @method Eleve[]    findAll()
 * @method Eleve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EleveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Eleve::class);
    }

    public function save(Eleve $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Eleve $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    public function getCoursEleve(int $compteID): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT libelle, date_inscription FROM cours c, inscription i, eleve e
            WHERE c.id = i.cour_id and i.eleve_id = e.id and compte_id = :compteID
            ';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery(['compteID' => $compteID]);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

    public function findPretInsturment(int $compteID) : array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT t.libelle AS libelleInstrument, num_serie FROM instrument i, pret_instrument p, eleve e, type_instrument t
            WHERE t.id = i.type_intrument_id and i.id = p.instrument_id and p.eleve_id = e.id and e.compte_id = :compteID
            ';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery(['compteID' => $compteID]);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

//    /**
//     * @return Eleve[] Returns an array of Eleve objects
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

//    public function findOneBySomeField($value): ?Eleve
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
