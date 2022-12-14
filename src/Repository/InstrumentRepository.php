<?php

namespace App\Repository;

use App\Entity\Instrument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Instrument>
 *
 * @method Instrument|null find($id, $lockMode = null, $lockVersion = null)
 * @method Instrument|null findOneBy(array $criteria, array $orderBy = null)
 * @method Instrument[]    findAll()
 * @method Instrument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstrumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Instrument::class);
    }

    public function save(Instrument $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Instrument $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    public function getCouleurs(int $instrumentID): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT c.libelle FROM instrument i, couleur c, couleur_instrument ci 
        WHERE i.id = ci.instrument_id and c.id = ci.couleur_id and i.id = :instrumentID
            ';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery(['instrumentID' => $instrumentID]);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

    public function getAccesoires(int $instrumentID): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT a.libelle FROM instrument i, accessoire a 
        WHERE i.id = a.instrument_id and i.id = :instrumentID
            ';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery(['instrumentID' => $instrumentID]);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

    public function getClasseInstrument(int $instrumentID): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT ci.libelle FROM instrument i, classe_instrument ci, type_instrument ti 
        WHERE i.type_intrument_id = ti.id and ci.id = ti.classe_intrument_id and i.id = :instrumentID
            ';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery(['instrumentID' => $instrumentID]);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

    public function getInterventions(int $instrumentID): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT * FROM instrument i, intervention it
        WHERE i.id = it.instrument_id and i.id = :instrumentID
            ';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery(['instrumentID' => $instrumentID]);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

    
    public function findPretInsturment(int $instrumentID) : array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT c.nom, c.prenom, date_pret FROM instrument i, pret_instrument p, eleve e, compte c
        WHERE i.id = p.instrument_id and p.eleve_id = e.id and e.compte_id = c.id and i.id = :instrumentID
            ';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery(['instrumentID' => $instrumentID]);
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

    public function getIsInIntervention(int $instrumentID) : array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT * FROM intervention WHERE instrument_id = :instrumentID and date_debut <= :dateToday and date_fin >= :dateToday';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery(['instrumentID' => $instrumentID, 'dateToday' => date('Y-m-d')]);
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

//    /**
//     * @return Instrument[] Returns an array of Instrument objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Instrument
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
