<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FactureRepository::class)
 */
class Facture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="factures")
     */
    private $client;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $total;

    /**
     * @ORM\OneToMany(targetEntity=Reglement::class, mappedBy="facture")
     */
    private $modeReglement;

    public function __construct()
    {
        $this->modeReglement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return Collection|Reglement[]
     */
    public function getModeReglement(): Collection
    {
        return $this->modeReglement;
    }

    public function addModeReglement(Reglement $modeReglement): self
    {
        if (!$this->modeReglement->contains($modeReglement)) {
            $this->modeReglement[] = $modeReglement;
            $modeReglement->setFacture($this);
        }

        return $this;
    }

    public function removeModeReglement(Reglement $modeReglement): self
    {
        if ($this->modeReglement->removeElement($modeReglement)) {
            // set the owning side to null (unless already changed)
            if ($modeReglement->getFacture() === $this) {
                $modeReglement->setFacture(null);
            }
        }

        return $this;
    }
}
