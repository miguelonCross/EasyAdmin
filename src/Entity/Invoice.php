<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvoiceRepository::class)
 */
class Invoice
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
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $billingPeriod;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $paymentAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPayed;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $paymentMethod;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $discount;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="invoices")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\OneToOne(targetEntity=Project::class, mappedBy="invoice", cascade={"persist", "remove"})
     */
    private $project;

    /**
     * @ORM\OneToOne(targetEntity=Budget::class, mappedBy="invoice", cascade={"persist", "remove"})
     */
    private $budget;

    /**
     * @ORM\OneToMany(targetEntity=WorkMade::class, mappedBy="invoice")
     */
    private $workMades;

    public function __construct()
    {
        $this->budgets = new ArrayCollection();
        $this->workMades = new ArrayCollection();
    }

    public function __toString()
    {
        return [
            $this->getProject()];
        // TODO: Implement __toString() method.
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

    public function getBillingPeriod(): ?string
    {
        return $this->billingPeriod;
    }

    public function setBillingPeriod(?string $billingPeriod): self
    {
        $this->billingPeriod = $billingPeriod;

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

    public function getPaymentAt(): ?\DateTimeImmutable
    {
        return $this->paymentAt;
    }

    public function setPaymentAt(?\DateTimeImmutable $paymentAt): self
    {
        $this->paymentAt = $paymentAt;

        return $this;
    }

    public function getIsPayed(): ?bool
    {
        return $this->isPayed;
    }

    public function setIsPayed(bool $isPayed): self
    {
        $this->isPayed = $isPayed;

        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(?int $discount): self
    {
        $this->discount = $discount;

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

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        // unset the owning side of the relation if necessary
        if ($project === null && $this->project !== null) {
            $this->project->setInvoice(null);
        }

        // set the owning side of the relation if necessary
        if ($project !== null && $project->getInvoice() !== $this) {
            $project->setInvoice($this);
        }

        $this->project = $project;

        return $this;
    }

    public function getBudget(): ?Budget
    {
        return $this->budget;
    }

    public function setBudget(?Budget $budget): self
    {
        // unset the owning side of the relation if necessary
        if ($budget === null && $this->budget !== null) {
            $this->budget->setInvoice(null);
        }

        // set the owning side of the relation if necessary
        if ($budget !== null && $budget->getInvoice() !== $this) {
            $budget->setInvoice($this);
        }

        $this->budget = $budget;

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
            $workMade->setInvoice($this);
        }

        return $this;
    }

    public function removeWorkMade(WorkMade $workMade): self
    {
        if ($this->workMades->removeElement($workMade)) {
            // set the owning side to null (unless already changed)
            if ($workMade->getInvoice() === $this) {
                $workMade->setInvoice(null);
            }
        }

        return $this;
    }
}
