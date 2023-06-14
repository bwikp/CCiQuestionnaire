<?php

namespace App\Repository;

use App\Entity\DernierEmploiStage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DernierEmploiStage>
 *
 * @method DernierEmploiStage|null find($id, $lockMode = null, $lockVersion = null)
 * @method DernierEmploiStage|null findOneBy(array $criteria, array $orderBy = null)
 * @method DernierEmploiStage[]    findAll()
 * @method DernierEmploiStage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DernierEmploiStageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DernierEmploiStage::class);
    }

    public function save(DernierEmploiStage $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DernierEmploiStage $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DernierEmploiStage[] Returns an array of DernierEmploiStage objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DernierEmploiStage
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
