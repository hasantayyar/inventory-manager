<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ItemRepository")
 */
class Item {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="stock", type="float")
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="stock_type", type="string", length=255)
     */
    private $stockType;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255,nullable=true)
     */
    private $photo;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Item
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set stock
     *
     * @param float $stock
     * @return Item
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return float 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set stockType
     *
     * @param string $stockType
     * @return Item
     */
    public function setStockType($stockType)
    {
        $this->stockType = $stockType;

        return $this;
    }

    /**
     * Get stockType
     *
     * @return string 
     */
    public function getStockType()
    {
        return $this->stockType;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Item
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Item
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    public function getUploadRootDir()
    {
        // absolute path to your directory where images must be saved
        return __DIR__ . '/../../../web/' . $this->getUploadDir();
    }

    public function getUploadDir()
    {
        return 'uploads/items';
    }

    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDir() . '/' . $this->image;
    }

    public function getWebPath()
    {
        return null === $this->image ? null : '/' . $this->getUploadDir() . '/' . $this->image;
    }

    public function getImageWebPath()
    {
        return '/' . $this->getUploadDir() . '/' . $this->getPhoto();
    }

}
