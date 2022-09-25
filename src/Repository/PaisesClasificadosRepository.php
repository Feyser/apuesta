<?php

namespace App\Repository;

use App\Entity\PaisesClasificados;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PaisesClasificados>
 *
 * @method PaisesClasificados|null find($id, $lockMode = null, $lockVersion = null)
 * @method PaisesClasificados|null findOneBy(array $criteria, array $orderBy = null)
 * @method PaisesClasificados[]    findAll()
 * @method PaisesClasificados[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaisesClasificadosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PaisesClasificados::class);
    }

    public function add(PaisesClasificados $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PaisesClasificados $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PaisesClasificados[] Returns an array of PaisesClasificados objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PaisesClasificados
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
