<?php

declare(strict_types=1);

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\OrderAddres;
use Domain\Model\ValueObject\OrderEmail;
use Domain\Model\ValueObject\OrderId;
use Domain\Model\ValueObject\OrderName;
use Domain\Model\ValueObject\OrderPhone;
use Domain\Model\ValueObject\OrderPostcode;
use Domain\Model\ValueObject\OrderTotalPrices;
use Domain\Model\ValueObject\OrderUserId;

class Order
{
    private $id;
    private $userId;
    private $name;
    private $addres;
    private $postCode;
    private $phone;
    private $email;
    private $totalPrices;

    public function __construct(OrderId $orderId, OrderUserId $orderUserId, OrderName $orderName, OrderAddres $orderAddres, OrderPostcode $orderPostcode, OrderPhone $orderPhone, OrderEmail $orderEmail, OrderTotalPrices $orderTotalPrices)
    {
        $this->id = $orderId;
        $this->userId = $orderUserId;
        $this->name = $orderName;
        $this->addres = $orderAddres;
        $this->postCode = $orderPostcode;
        $this->phone = $orderPhone;
        $this->email = $orderEmail;
        $this->totalPrices = $orderTotalPrices;
    }

    public function id(): OrderId
    {
        return $this->id;
    }

    public function userId(): OrderUserId
    {
        return $this->userId;
    }

    public function name(): OrderName
    {
        return $this->name;
    }

    public function addres(): OrderAddres
    {
        return $this->addres;
    }

    public function postCode(): OrderPostcode
    {
        return $this->postCode;
    }

    public function phone(): OrderPhone
    {
        return $this->phone;
    }

    public function email(): OrderEmail
    {
        return $this->email;
    }

    public function totalPrices(): OrderTotalPrices
    {
        return $this->totalPrices;
    }
}
