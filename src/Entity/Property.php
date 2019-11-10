<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;



/**
 * @ORM\Entity(repositoryClass="App\Repository\PropertyRepository")
 * @Vich\Uploadable
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
 * @var string|null
 * @ORM\Column(type="string", length=255)
 */
private $filename;

/**
 * @var File|null
 * @Vich\UploadableField(mapping="property_image", fileNameProperty="filename")
 * @Assert\Image(
     *     minWidth = "500",
     *     minWidthMessage = "The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px",   
     *     minHeight = "350",
     *     minHeightMessage = "The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px",
     *     mimeTypes = {"image/jpeg", "image/png","image/jpg"},
     *     mimeTypesMessage = "Only .jpeg .png .jpg  Extension valide"
     * )
 */
private $imageFile;


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

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime|null
     */
    private $updated_at;

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



/**
 * Get the value of filename
 *
 * @return  string|null
 */ 
public function getFilename(): ?string
{
return $this->filename;
}

/**
 * Set the value of filename
 *
 * @param  string|null  $filename
 *
 * @return  Property
 */ 
public function setFilename(?string $filename): Property
{
$this->filename = $filename;

return $this;
}

/**
 * Get the value of imageFile
 *
 * @return  File|null
 */ 
public function getImageFile(): ?File
{
return $this->imageFile;
}

/**
 * Set the value of imageFile
 *
 * @param  File|null  $imageFile
 *
 * @return  Property
 */ 
public function setImageFile(?File $imageFile): Property
{
$this->imageFile = $imageFile;
if ($this->imageFile instanceof UploadedFile) {
    $this->updated_at = new \DateTime('now');
}
return $this;
}

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
