<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource
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
     * @ORM\OneToOne(targetEntity="CartItem", mappedBy="basket", cascade={"all"})
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
    public function getCartItems()
    {
        return $this->cartItems;
    }

    /**
     * @param mixed $cartItem
     */
    public function setCartItems($cartItem)
    {
        if($this->contains)
        $this->cartItems = new ArrayCollection($cartItem);
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return "";
    }
}