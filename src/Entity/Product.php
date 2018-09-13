<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use ApiPlatform\Core\Annotation\ApiResource;

/**
* @ApiResource
* @ORM\Entity
* @Vich\Uploadable
*/
class Product
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
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $description;

    /**
     * Many Products have Many Categories
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(nullable=true)
     *///      * @ORM\JoinTable(name="product   s_categories")
    private $categories;

    /**
     * Many Products has One CartItems.
     * @ORM\ManyToMany(targetEntity="CartItem", mappedBy="products")
     * @ORM\JoinColumn(nullable=true)
     */
    private $cartItems;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    $this->cartItems = new ArrayCollection();

    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param mixed $category
     */
    public function setCategories(Category $category)
    {
        if($this->categories->contains($category)){
            return;
        }
        $this->categories[] = $category;
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
        if($this->cartItem->contains($cartItem)){
            return;
        }
        $this->cartItems[] = $cartItem;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this-> lib;
    }

}