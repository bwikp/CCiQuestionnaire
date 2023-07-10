<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\PromoFormation;
use App\Entity\Resultat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Resultat>
 *
 * @method Resultat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Resultat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Resultat[]    findAll()
 * @method Resultat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResultatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Resultat::class);
    }

    public function save(Resultat $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Resultat $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /** Recupere les resultats en lien avec une recherche
        @return Resultat[]
     */
    // public function findSearch(SearchData $search): array
    // {
    //     $query = $this
    //         ->createQueryBuilder('p')
    //         ->select('p')
    //         // ->addSelect('c');
    //         ->join('p.dossier', 'c')
    //         // ->join('c.promoformation', 'd')
    //         // ->join('d.Promotion', 'e');
    //     ;
    //     if (!empty($search->q)) {
    //         $query = $query
    //             ->andWhere('p.name LIKE :q')
    //             ->setParameter('q', "%{search->q}%");
    //     }

    //     return $query->getQuery()->getResult();
    // }
    //    /**
    //     * @return Resultat[] Returns an array of Resultat objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Resultat
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
