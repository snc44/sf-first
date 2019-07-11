<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=400, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=600, nullable=true)
     */
    private $imagesrc;

    /**
     * @ORM\Column(type="datetime")
     */
    private $uploaded;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImagesrc(): ?string
    {
        return $this->imagesrc;
    }

    public function setImagesrc(?string $imagesrc): self
    {
        $this->imagesrc = $imagesrc;

        return $this;
    }

    public function getUploaded(): ?\DateTimeInterface
    {
        return $this->uploaded;
    }

    public function setUploaded(\DateTimeInterface $uploaded): self
    {
        $this->uploaded = $uploaded;

        return $this;
    }
}
