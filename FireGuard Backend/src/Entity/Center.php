<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use OpenApi\Annotations as OA;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Address;

/**
 * Center
 *
 * @ORM\Table(name="center",
 *      indexes={
 *          @ORM\Index(name="idx_ft_name", columns={"name"}),
 *          @ORM\Index(name="phone_number", columns={"phone_number"}),
 *          @ORM\Index(name="status", columns={"status"})
 * })
 * @ORM\Entity
 * @Serializer\ExclusionPolicy("All")
 * @ORM\HasLifecycleCallbacks()
 */
class Center
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Serializer\Expose()
     * @OA\Property(example=1)
     * @Serializer\Groups({"list", "details"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Serializer\Expose()
     * @OA\Property(example=1)
     * @Serializer\Groups({"list", "details"})
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     * @Serializer\Expose()
     * @OA\Property(example=1)
     * @Serializer\Groups({"list", "details"})
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=20, nullable=false)
     * @Serializer\Expose()
     * @OA\Property(example=1)
     * @Serializer\Groups({"list", "details"})
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     * @Serializer\Expose()
     * @OA\Property(example=1)
     * @Serializer\Groups({"list", "details"})
     */
    private $status;
    
    /**
    * @var string|null
    *
    * @ORM\Column(name="name_address", type="string", length=100, nullable=true)
    * @Serializer\Expose()
    * @OA\Property(example="damas")
    * @Serializer\Groups({"list", "details"})
    */
    private $nameAddress;
    
    /**
    * @var string
    *
    * @ORM\Column(name="longitude", type="string", length=255, nullable=false)
    * @Assert\NotBlank()
    * @OA\Property(example="Hamra")
    * @Serializer\Expose()
    * @Serializer\Groups({"list", "details"})
    */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=255, nullable=false)
     * @Serializer\Expose()
     * @OA\Property(example=1)
     * @Serializer\Groups({"list", "details"})
     */
    private $latitude;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     * @Serializer\Expose()
     * @OA\Property(example="2022-11-16T22:36:33+01:00")
     * @Serializer\Groups({"list", "details"})
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     * @Serializer\Expose()
     * @OA\Property(example="2022-11-16T22:36:33+01:00")
     * @Serializer\Groups({"list", "details"})
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
    
    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }
    
    public function getNameAddress(): ?string
    {
        return $this->nameAddress;
    }

    public function setNameAddress(string $nameAddress): static
    {
        $this->nameAddress = $nameAddress;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @ORM\PrePersist()
     */
    public function beforeCreate(): void
    {
        $dateTime = new \DateTime();
        $this->createdAt = $dateTime;
        $this->updatedAt = $dateTime;
    }

    /**
     * @ORM\PreUpdate()
     */
    public function beforeUpdate(): void
    {
        $this->updatedAt = new \DateTime();
    }
}
