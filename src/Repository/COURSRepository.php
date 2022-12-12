<?php

namespace App\Repository;

use App\Entity\Cours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cours>
 *
 * @method Cours|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cours|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cours[]    findAll()
 * @method Cours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cours::class);
    }

    public function save(Cours $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Cours $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return COURS[] Returns an array of COURS objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?COURS
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
    public function getMonPlanning(int $compteID): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT compte.nom, compte.prenom, cours.id, cours.professeur_id, cours.libelle, cours.age_mini, cours.agemaxi, cours.heure_debut, cours.heure_fin, cours.date, cours.nbplaces
        FROM cours, professeur_cours, compte
        WHERE compte.id = professeur_cours.compte_id
        AND professeur_cours.id = cours.professeur_id
        AND compte.id = :compteID
        UNION
        SELECT compte.nom, compte.prenom, cours.id, cours.professeur_id, cours.libelle, cours.age_mini, cours.agemaxi, cours.heure_debut, cours.heure_fin, cours.date, cours.nbplaces
        FROM cours, inscription, eleve, compte
        WHERE compte.id = eleve.compte_id
        AND eleve.id = inscription.eleve_id
        AND inscription.cour_id = cours.id
        AND compte.id = :compteID
        ORDER by date
            ';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery(['compteID' => $compteID]);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }
}
