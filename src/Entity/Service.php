<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity=ServiceBudget::class, mappedBy="service")
     */
    private $serviceBudgets;

    /**
     * @ORM\OneToMany(targetEntity=WorkMade::class, mappedBy="service")
     */
    private $workMades;

    public function __construct()
    {
        $this->serviceBudgets = new ArrayCollection();
        $this->workMades = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
        // TODO: Implement __toString() method.
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection|ServiceBudget[]
     */
    public function getServiceBudgets(): Collection
    {
        return $this->serviceBudgets;
    }

    public function addServiceBudget(ServiceBudget $serviceBudget): self
    {
        if (!$this->serviceBudgets->contains($serviceBudget)) {
            $this->serviceBudgets[] = $serviceBudget;
            $serviceBudget->setService($this);
        }

        return $this;
    }

    public function removeServiceBudget(ServiceBudget $serviceBudget): self
    {
        if ($this->serviceBudgets->removeElement($serviceBudget)) {
            // set the owning side to null (unless already changed)
            if ($serviceBudget->getService() === $this) {
                $serviceBudget->setService(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|WorkMade[]
     */
    public function getWorkMades(): Collection
    {
        return $this->workMades;
    }

    public function addWorkMade(WorkMade $workMade): self
    {
        if (!$this->workMades->contains($workMade)) {
            $this->workMades[] = $workMade;
            $workMade->setServices($this);
        }

        return $this;
    }

    public function removeWorkMade(WorkMade $workMade): self
    {
        if ($this->workMades->removeElement($workMade)) {
            // set the owning side to null (unless already changed)
            if ($workMade->getServices() === $this) {
                $workMade->setServices(null);
            }
        }

        return $this;
    }
}
