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
     * @ORM\ManyToOne(targetEntity="CartItem", inversedBy="baskets")
     * @ORM\JoinColumn(nullable=true)
     */
    private $cartItem;

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
        return $this->cartItem;
    }

    /**
     * @param mixed $cartItem
     */
    public function setCartItem($cartItem)
    {
        $this->cartItem = $cartItem;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return "";
    }
}