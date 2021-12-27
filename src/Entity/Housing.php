<?php

namespace App\Entity;

use App\Repository\HousingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

#[ORM\Entity(repositoryClass: HousingRepository::class)]
class Housing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $lot;

    #[ORM\Column(type: 'string', length: 255)]
    private string $type;

    #[ORM\ManyToOne(targetEntity: Building::class, inversedBy: 'housings')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Building $building;

    /**
     * @var Collection<int|string, Lodger>
     */
    #[ORM\OneToMany(mappedBy: 'housing', targetEntity: Lodger::class)]
    private Collection $lodgers;

    #[Pure]
    public function __construct()
    {
        $this->lodgers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLot(): ?string
    {
        return $this->lot;
    }

    public function setLot(string $lot): self
    {
        $this->lot = $lot;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getBuilding(): ?Building
    {
        return $this->building;
    }

    public function setBuilding(?Building $building): self
    {
        $this->building = $building;

        return $this;
    }

    /**
     * @return Collection<int|string, Lodger>
     */
    public function getLodgers(): Collection
    {
        return $this->lodgers;
    }

    public function addLodger(Lodger $lodger): self
    {
        if (!$this->lodgers->contains($lodger)) {
            $this->lodgers[] = $lodger;
            $lodger->setHousing($this);
        }

        return $this;
    }

    public function removeLodger(Lodger $lodger): self
    {
        if ($this->lodgers->removeElement($lodger)) {
            // set the owning side to null (unless already changed)
            if ($lodger->getHousing() === $this) {
                $lodger->setHousing(null);
            }
        }

        return $this;
    }
}
