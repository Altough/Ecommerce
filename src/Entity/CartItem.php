<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource
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
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantity = null;


    /**
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="cartItems")
     * @ORM\JoinColumn(name="product_cart_item")
     * @var Collection<Product>
     */
    private $products;

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function __construct()
    {
        $this->products = new ArrayCollection();

    }


    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $product
     */
    public function setProducts($product)
    {
       if($this->products->contains($product))
            return;
        $this->products[] = $product;
    }

    /**
     * @ORM\OneToOne(targetEntity="Basket", inversedBy="cartItems")
     * @ORM\JoinColumn(nullable=true)
     */
    private $basket = null;


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
    public function getBasket()
    {
        return $this->basket;
    }

    /**
     * @param mixed $basket
     */
    public function setBasket($basket)
    {
        $this->baskets->$basket;
    }

    public function __toString()
    {
        return $this->lib;
    }
}