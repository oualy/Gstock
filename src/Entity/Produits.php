<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitsRepository::class)
 */
class Produits
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
    private $nomproduits;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categories;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stock;

    /**
     * @ORM\ManyToMany(targetEntity=Vente::class, mappedBy="produits")
     */
    private $ventes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prixproduits;

    public function __construct()
    {
        $this->ventes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomproduits(): ?string
    {
        return $this->nomproduits;
    }

    public function setNomproduits(string $nomproduits): self
    {
        $this->nomproduits = $nomproduits;

        return $this;
    }

    public function getCategories(): ?string
    {
        return $this->categories;
    }

    public function setCategories(string $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function getStock(): ?string
    {
        return $this->stock;
    }

    public function setStock(string $stock): self
    {
        $this->stock = $stock;

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
            $vente->addProduit($this);
        }

        return $this;
    }

    public function removeVente(Vente $vente): self
    {
        if ($this->ventes->removeElement($vente)) {
            $vente->removeProduit($this);
        }

        return $this;
    }
    
    public function __toString()
    {
        return $this->nomproduits.''.$this->prixproduits ;
    }

    public function getPrixproduits(): ?int
    {
        return $this->prixproduits;
    }

    public function setPrixproduits(?int $prixproduits): self
    {
        $this->prixproduits = $prixproduits;

        return $this;
    }
}
