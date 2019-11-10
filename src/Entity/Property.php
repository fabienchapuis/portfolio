<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PropertyRepository")
 */
class Property
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5 ,max=15)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5)
     */
    private $description;

        /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url(
     *    protocols = {"https"} ,message = "url '{{ value }}'non valide")
     * 
     * @var string|null
     */
    private $url;

        /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $date;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
    public function getDate(): ?\DateTime
    {
        return $this->date;
    }
    public function setDate(\DateTime $date): self
    {
        $this->date = $date;
        return $this;

    }

    public function getUrl(): ?string
    {
        return $this->url;
    }
    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }
}
