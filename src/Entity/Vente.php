<?php

namespace App\Entity;

use App\Repository\VenteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VenteRepository::class)
 */
class Vente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $total;

    /**
     * @ORM\ManyToOne(targetEntity=Clients::class, inversedBy="ventes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $clients;

    /**
     * @ORM\ManyToMany(targetEntity=Produits::class, inversedBy="ventes")
     */
    private $produits;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantitevente;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotal(): ?int
    {
        return $this->getQuantitevente() * $this->getPrix();

        return  $this->total;

    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getClients(): ?Clients
    {
        return $this->clients;
    }

    public function setClients(?Clients $clients): self
    {
        $this->clients = $clients;

        return $this;
    }

    /**
     * @return Collection|Produits[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produits $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
        }

        return $this;
    }

    public function removeProduit(Produits $produit): self
    {
        $this->produits->removeElement($produit);

        return $this;
    }

    public function getQuantitevente(): ?int
    {
        return $this->quantitevente;
    }

    public function setQuantitevente(int $quantitevente): self
    {
        $this->quantitevente = $quantitevente;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }


    
}
