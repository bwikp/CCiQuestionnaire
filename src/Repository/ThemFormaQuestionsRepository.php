<?php

namespace App\Repository;

use App\Entity\ThemFormaQuestions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ThemFormaQuestions>
 *
 * @method ThemFormaQuestions|null find($id, $lockMode = null, $lockVersion = null)
 * @method ThemFormaQuestions|null findOneBy(array $criteria, array $orderBy = null)
 * @method ThemFormaQuestions[]    findAll()
 * @method ThemFormaQuestions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThemFormaQuestionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ThemFormaQuestions::class);
    }

    public function save(ThemFormaQuestions $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ThemFormaQuestions $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ThemFormaQuestions[] Returns an array of ThemFormaQuestions objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ThemFormaQuestions
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
