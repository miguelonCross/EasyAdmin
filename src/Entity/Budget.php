<?php

namespace App\Entity;

use App\Repository\BudgetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BudgetRepository::class)
 */
class Budget
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
    private $code;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="budgets")
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity=ServiceBudget::class, mappedBy="budget")
     */
    private $serviceBudgets;

    /**
     * @ORM\OneToOne(targetEntity=Invoice::class, inversedBy="budget", cascade={"persist", "remove"})
     */
    private $invoice;


    public function __construct()
    {
        $this->serviceBudgets = new ArrayCollection();
        $this->setCode('asdasdasdad');
    }

    public function calcularPrecio()
    {
        return $this->getServiceBudgets()->getValues();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

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
            $serviceBudget->setBudget($this);
        }

        return $this;
    }

    public function removeServiceBudget(ServiceBudget $serviceBudget): self
    {
        if ($this->serviceBudgets->removeElement($serviceBudget)) {
            // set the owning side to null (unless already changed)
            if ($serviceBudget->getBudget() === $this) {
                $serviceBudget->setBudget(null);
            }
        }

        return $this;
    }

    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(?Invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

}
