<?php

namespace App\Entity;

use App\Repository\DeliveryRollRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeliveryRollRepository::class)
 */
class DeliveryRoll
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
    private $rollName;

    /**
     * @ORM\Column(type="integer")
     */
    private $rollPrice;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rollComposition;

    /**
     * @ORM\ManyToOne(targetEntity=DeliveryKit::class, inversedBy="deliveryRollInKit")
     */
    private $deliveryKit;

    /**
     * @ORM\OneToMany(targetEntity=DeliveryOrder::class, mappedBy="orderRoll")
     */
    private $deliveryOrders;

    public function __construct()
    {
        $this->deliveryOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRollName(): ?string
    {
        return $this->rollName;
    }

    public function setRollName(string $rollName): self
    {
        $this->rollName = $rollName;

        return $this;
    }

    public function getRollPrice(): ?int
    {
        return $this->rollPrice;
    }

    public function setRollPrice(int $rollPrice): self
    {
        $this->rollPrice = $rollPrice;

        return $this;
    }

    public function getRollComposition(): ?string
    {
        return $this->rollComposition;
    }

    public function setRollComposition(?string $rollComposition): self
    {
        $this->rollComposition = $rollComposition;

        return $this;
    }

    public function getDeliveryKit(): ?DeliveryKit
    {
        return $this->deliveryKit;
    }

    public function setDeliveryKit(?DeliveryKit $deliveryKit): self
    {
        $this->deliveryKit = $deliveryKit;

        return $this;
    }

    /**
     * @return Collection|DeliveryOrder[]
     */
    public function getDeliveryOrders(): Collection
    {
        return $this->deliveryOrders;
    }

    public function addDeliveryOrder(DeliveryOrder $deliveryOrder): self
    {
        if (!$this->deliveryOrders->contains($deliveryOrder)) {
            $this->deliveryOrders[] = $deliveryOrder;
            $deliveryOrder->setOrderRoll($this);
        }

        return $this;
    }

    public function removeDeliveryOrder(DeliveryOrder $deliveryOrder): self
    {
        if ($this->deliveryOrders->removeElement($deliveryOrder)) {
            // set the owning side to null (unless already changed)
            if ($deliveryOrder->getOrderRoll() === $this) {
                $deliveryOrder->setOrderRoll(null);
            }
        }

        return $this;
    }
}
