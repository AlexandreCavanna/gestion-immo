<?php

namespace App\Entity;

use App\Repository\LodgerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LodgerRepository::class)]
class Lodger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 50)]
    private string $firstname;

    #[ORM\Column(type: 'string', length: 50)]
    private string $lastname;

    #[ORM\Column(type: 'string', length: 255)]
    private string $phone;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $email;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $startDate;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $EndDate;

    #[ORM\ManyToOne(targetEntity: Housing::class, inversedBy: 'lodgers')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Housing $housing;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->EndDate;
    }

    public function setEndDate(?\DateTimeInterface $EndDate): self
    {
        $this->EndDate = $EndDate;

        return $this;
    }

    public function getHousing(): ?Housing
    {
        return $this->housing;
    }

    public function setHousing(?Housing $housing): self
    {
        $this->housing = $housing;

        return $this;
    }
}
