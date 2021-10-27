<?php

namespace App\Entity;

use App\Repository\DeliveryDrinkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeliveryDrinkRepository::class)
 */
class DeliveryDrink
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
    private $drinkName;

    /**
     * @ORM\Column(type="integer")
     */
    private $drinkPrice;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $drinkComposition;

    /**
     * @ORM\ManyToOne(targetEntity=DeliveryKit::class, inversedBy="deliveryDrinkInKit")
     */
    private $deliveryKit;

    /**
     * @ORM\OneToMany(targetEntity=DeliveryOrder::class, mappedBy="orderDrink")
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

    public function getDrinkName(): ?string
    {
        return $this->drinkName;
    }

    public function setDrinkName(string $drinkName): self
    {
        $this->drinkName = $drinkName;

        return $this;
    }

    public function getDrinkPrice(): ?int
    {
        return $this->drinkPrice;
    }

    public function setDrinkPrice(int $drinkPrice): self
    {
        $this->drinkPrice = $drinkPrice;

        return $this;
    }

    public function getDrinkComposition(): ?string
    {
        return $this->drinkComposition;
    }

    public function setDrinkComposition(?string $drinkComposition): self
    {
        $this->drinkComposition = $drinkComposition;

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
            $deliveryOrder->setOrderDrink($this);
        }

        return $this;
    }

    public function removeDeliveryOrder(DeliveryOrder $deliveryOrder): self
    {
        if ($this->deliveryOrders->removeElement($deliveryOrder)) {
            // set the owning side to null (unless already changed)
            if ($deliveryOrder->getOrderDrink() === $this) {
                $deliveryOrder->setOrderDrink(null);
            }
        }

        return $this;
    }
}
