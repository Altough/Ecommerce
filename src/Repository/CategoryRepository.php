<?php
/**
 * Created by PhpStorm.
 * User: traor004
 * Date: 05/02/18
 * Time: 14:54
 */

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function findAll()
    {
        $query = $this->createQueryBuilder('c')

            ->orderBy('c', 'ASC')
            ->getQuery();

        return $query->execute();
    }

    /*public function find($id)
    {
        $query = $this->createQueryBuilder('c')
            ->where('c.id LIKE :id')
            ->setParameter('id' , $id)
            ->getQuery();
    }*/

    public function find($id, $lockMode = null, $lockVersion = null)
    {
        $query = $this->createQueryBuilder('c')
            ->where('c.id LIKE :id')
            ->setParameter('id' , $id)
            ->getQuery();
        return $query->execute();
    }


}