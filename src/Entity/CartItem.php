<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class CartItem
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ var string
     * @ORM\Column(type="string", length=50)
     */
    private $lib;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="cartItem")
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity="Basket", mappedBy="cartItem")
     */
    private $baskets;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->baskets = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return  mixed
     */
    public function getLib()
    {
        return $this->lib;
    }

    /**
     * @param mixed $lib
     */
    public function setLib($lib)
    {
        $this->lib = $lib;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * @return mixed
     */
    public function getBaskets()
    {
        return $this->baskets;
    }

    /**
     * @param mixed $baskets
     */
    public function setBasket($baskets)
    {
        $this->baskets = $baskets;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this-> lib;
    }

}