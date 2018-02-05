<?php
/**
 * Created by PhpStorm.
 * User: traor004
 * Date: 05/02/18
 * Time: 14:54
 */

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findAll()
    {
        $query = $this->createQueryBuilder('p')
            ->orderBy('p', 'ASC')
            ->getQuery();

        return $query->execute();
    }

    public function find($id, $lockMode = null, $lockVersion = null)
    {
        $query = $this->createQueryBuilder('p')
            ->where('p.id LIKE :id')
            ->setParameter('id' , $id)
            ->getQuery();
        return $query->execute();
    }
}