<?php

namespace App\Entity;

use App\Repository\ChargeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChargeRepository::class)]
class Charge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'float', nullable: true)]
    private float $boilerCharge;

    #[ORM\Column(type: 'float')]
    private float $electricityCharge;

    #[ORM\Column(type: 'float', nullable: true)]
    private float $maintenanceCharge;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBoilerCharge(): ?float
    {
        return $this->boilerCharge;
    }

    public function setBoilerCharge(?float $boilerCharge): self
    {
        $this->boilerCharge = $boilerCharge;

        return $this;
    }

    public function getElectricityCharge(): ?float
    {
        return $this->electricityCharge;
    }

    public function setElectricityCharge(float $electricityCharge): self
    {
        $this->electricityCharge = $electricityCharge;

        return $this;
    }

    public function getMaintenanceCharge(): ?float
    {
        return $this->maintenanceCharge;
    }

    public function setMaintenanceCharge(?float $maintenanceCharge): self
    {
        $this->maintenanceCharge = $maintenanceCharge;

        return $this;
    }
}
