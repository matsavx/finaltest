<?php

namespace App\Entity;

use App\Repository\DeliveryKitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeliveryKitRepository::class)
 */
class DeliveryKit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=DeliveryPizza::class, mappedBy="deliveryKit")
     */
    private $deliveryPizzaInKit;

    /**
     * @ORM\OneToMany(targetEntity=DeliveryDrink::class, mappedBy="deliveryKit")
     */
    private $deliveryDrinkInKit;

    /**
     * @ORM\OneToMany(targetEntity=DeliveryRoll::class, mappedBy="deliveryKit")
     */
    private $deliveryRollInKit;

    /**
     * @ORM\OneToMany(targetEntity=DeliveryOrder::class, mappedBy="orderKit")
     */
    private $deliveryOrders;

    public function __construct()
    {
        $this->deliveryPizzaInKit = new ArrayCollection();
        $this->deliveryDrinkInKit = new ArrayCollection();
        $this->deliveryRollInKit = new ArrayCollection();
        $this->deliveryOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|DeliveryPizza[]
     */
    public function getDeliveryPizzaInKit(): Collection
    {
        return $this->deliveryPizzaInKit;
    }

    public function addDeliveryPizzaInKit(DeliveryPizza $deliveryPizzaInKit): self
    {
        if (!$this->deliveryPizzaInKit->contains($deliveryPizzaInKit)) {
            $this->deliveryPizzaInKit[] = $deliveryPizzaInKit;
            $deliveryPizzaInKit->setDeliveryKit($this);
        }

        return $this;
    }

    public function removeDeliveryPizzaInKit(DeliveryPizza $deliveryPizzaInKit): self
    {
        if ($this->deliveryPizzaInKit->removeElement($deliveryPizzaInKit)) {
            // set the owning side to null (unless already changed)
            if ($deliveryPizzaInKit->getDeliveryKit() === $this) {
                $deliveryPizzaInKit->setDeliveryKit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DeliveryDrink[]
     */
    public function getDeliveryDrinkInKit(): Collection
    {
        return $this->deliveryDrinkInKit;
    }

    public function addDeliveryDrinkInKit(DeliveryDrink $deliveryDrinkInKit): self
    {
        if (!$this->deliveryDrinkInKit->contains($deliveryDrinkInKit)) {
            $this->deliveryDrinkInKit[] = $deliveryDrinkInKit;
            $deliveryDrinkInKit->setDeliveryKit($this);
        }

        return $this;
    }

    public function removeDeliveryDrinkInKit(DeliveryDrink $deliveryDrinkInKit): self
    {
        if ($this->deliveryDrinkInKit->removeElement($deliveryDrinkInKit)) {
            // set the owning side to null (unless already changed)
            if ($deliveryDrinkInKit->getDeliveryKit() === $this) {
                $deliveryDrinkInKit->setDeliveryKit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DeliveryRoll[]
     */
    public function getDeliveryRollInKit(): Collection
    {
        return $this->deliveryRollInKit;
    }

    public function addDeliveryRollInKit(DeliveryRoll $deliveryRollInKit): self
    {
        if (!$this->deliveryRollInKit->contains($deliveryRollInKit)) {
            $this->deliveryRollInKit[] = $deliveryRollInKit;
            $deliveryRollInKit->setDeliveryKit($this);
        }

        return $this;
    }

    public function removeDeliveryRollInKit(DeliveryRoll $deliveryRollInKit): self
    {
        if ($this->deliveryRollInKit->removeElement($deliveryRollInKit)) {
            // set the owning side to null (unless already changed)
            if ($deliveryRollInKit->getDeliveryKit() === $this) {
                $deliveryRollInKit->setDeliveryKit(null);
            }
        }

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
            $deliveryOrder->setOrderKit($this);
        }

        return $this;
    }

    public function removeDeliveryOrder(DeliveryOrder $deliveryOrder): self
    {
        if ($this->deliveryOrders->removeElement($deliveryOrder)) {
            // set the owning side to null (unless already changed)
            if ($deliveryOrder->getOrderKit() === $this) {
                $deliveryOrder->setOrderKit(null);
            }
        }

        return $this;
    }
}
