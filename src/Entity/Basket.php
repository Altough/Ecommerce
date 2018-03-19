<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Basket
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
     * One basket has Many CartItems.
     * @ORM\OneToMany(targetEntity="CartItem", mappedBy="basket")
     */
    private $cartItems;

    /**
     * @return mixed
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
     * @return mixed
     */
    public function getCartItem()
    {
        return $this->cartItems;
    }

    /**
     * @param mixed $cartItem
     */
    public function setCartItems($cartItem)
    {
        $this->cartItems->add($cartItem);
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return "";
    }
}