<?php

namespace App\Entity;

use App\Repository\DeliveryOrderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeliveryOrderRepository::class)
 */
class DeliveryOrder
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
    private $orderAddress;

    /**
     * @ORM\Column(type="integer")
     */
    private $orderTotalPrice;

    /**
     * @ORM\ManyToOne(targetEntity=DeliveryKit::class, inversedBy="deliveryOrders")
     */
    private $orderKit;

    /**
     * @ORM\ManyToOne(targetEntity=DeliveryPizza::class, inversedBy="deliveryOrders")
     */
    private $orderPizza;

    /**
     * @ORM\ManyToOne(targetEntity=DeliveryDrink::class, inversedBy="deliveryOrders")
     */
    private $orderDrink;

    /**
     * @ORM\ManyToOne(targetEntity=DeliveryRoll::class, inversedBy="deliveryOrders")
     */
    private $orderRoll;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderAddress(): ?string
    {
        return $this->orderAddress;
    }

    public function setOrderAddress(string $orderAddress): self
    {
        $this->orderAddress = $orderAddress;

        return $this;
    }

    public function getOrderTotalPrice(): ?int
    {
        return $this->orderTotalPrice;
    }

    public function setOrderTotalPrice(int $orderTotalPrice): self
    {
        $this->orderTotalPrice = $orderTotalPrice;

        return $this;
    }

    public function getOrderKit(): ?DeliveryKit
    {
        return $this->orderKit;
    }

    public function setOrderKit(?DeliveryKit $orderKit): self
    {
        $this->orderKit = $orderKit;

        return $this;
    }

    public function getOrderPizza(): ?DeliveryPizza
    {
        return $this->orderPizza;
    }

    public function setOrderPizza(?DeliveryPizza $orderPizza): self
    {
        $this->orderPizza = $orderPizza;

        return $this;
    }

    public function getOrderDrink(): ?DeliveryDrink
    {
        return $this->orderDrink;
    }

    public function setOrderDrink(?DeliveryDrink $orderDrink): self
    {
        $this->orderDrink = $orderDrink;

        return $this;
    }

    public function getOrderRoll(): ?DeliveryRoll
    {
        return $this->orderRoll;
    }

    public function setOrderRoll(?DeliveryRoll $orderRoll): self
    {
        $this->orderRoll = $orderRoll;

        return $this;
    }
}
