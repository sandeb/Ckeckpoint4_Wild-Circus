<?php

namespace App\Entity;

use App\Repository\BuyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BuyRepository::class)
 */
class Buy
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="buys")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Politico::class, mappedBy="buy")
     */
    private $politico;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function __construct()
    {
        $this->politico = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
    public function __toString()
    {
        return $this->getName();
    }


    /**
     * @return Collection|Politico[]
     */
    public function getPolitico(): Collection
    {
        return $this->politico;
    }

    public function addPolitico(Politico $politico): self
    {
        if (!$this->politico->contains($politico)) {
            $this->politico[] = $politico;
            $politico->setBuy($this);
        }

        return $this;
    }

    public function removePolitico(Politico $politico): self
    {
        if ($this->politico->contains($politico)) {
            $this->politico->removeElement($politico);
            // set the owning side to null (unless already changed)
            if ($politico->getBuy() === $this) {
                $politico->setBuy(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
