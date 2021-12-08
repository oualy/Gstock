<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientsRepository::class)
 */
class Clients
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomclients;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeclients;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomclients;

    /**
     * @ORM\OneToMany(targetEntity=Vente::class, mappedBy="clients")
     */
    private $ventes;

    public function __construct()
    {
        $this->ventes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomclients(): ?string
    {
        return $this->nomclients;
    }

    public function setNomclients(string $nomclients): self
    {
        $this->nomclients = $nomclients;

        return $this;
    }

    public function getTypeclients(): ?string
    {
        return $this->typeclients;
    }

    public function setTypeclients(?string $typeclients): self
    {
        $this->typeclients = $typeclients;

        return $this;
    }


    public function __toString()
    {
        return $this->nomclients.'  /  '.$this->typeclients;
    }

    public function getPrenomclients(): ?string
    {
        return $this->prenomclients;
    }

    public function setPrenomclients(string $prenomclients): self
    {
        $this->prenomclients = $prenomclients;

        return $this;
    }

    /**
     * @return Collection|Vente[]
     */
    public function getVentes(): Collection
    {
        return $this->ventes;
    }

    public function addVente(Vente $vente): self
    {
        if (!$this->ventes->contains($vente)) {
            $this->ventes[] = $vente;
            $vente->setClients($this);
        }

        return $this;
    }

    public function removeVente(Vente $vente): self
    {
        if ($this->ventes->removeElement($vente)) {
            // set the owning side to null (unless already changed)
            if ($vente->getClients() === $this) {
                $vente->setClients(null);
            }
        }

        return $this;
    }

}
