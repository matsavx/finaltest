<?php

namespace App\Entity;

use App\Repository\DeliveryPizzaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeliveryPizzaRepository::class)
 */
class DeliveryPizza
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
    private $pizzaName;

    /**
     * @ORM\Column(type="integer")
     */
    private $pizzaPrice;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pizzaComposition;

    /**
     * @ORM\ManyToOne(targetEntity=DeliveryKit::class, inversedBy="deliveryPizzaInKit")
     */
    private $deliveryKit;

    /**
     * @ORM\OneToMany(targetEntity=DeliveryOrder::class, mappedBy="orderPizza")
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

    public function getPizzaName(): ?string
    {
        return $this->pizzaName;
    }

    public function setPizzaName(string $pizzaName): self
    {
        $this->pizzaName = $pizzaName;

        return $this;
    }

    public function getPizzaPrice(): ?int
    {
        return $this->pizzaPrice;
    }

    public function setPizzaPrice(int $pizzaPrice): self
    {
        $this->pizzaPrice = $pizzaPrice;

        return $this;
    }

    public function getPizzaComposition(): ?string
    {
        return $this->pizzaComposition;
    }

    public function setPizzaComposition(?string $pizzaComposition): self
    {
        $this->pizzaComposition = $pizzaComposition;

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
            $deliveryOrder->setOrderPizza($this);
        }

        return $this;
    }

    public function removeDeliveryOrder(DeliveryOrder $deliveryOrder): self
    {
        if ($this->deliveryOrders->removeElement($deliveryOrder)) {
            // set the owning side to null (unless already changed)
            if ($deliveryOrder->getOrderPizza() === $this) {
                $deliveryOrder->setOrderPizza(null);
            }
        }

        return $this;
    }
}
