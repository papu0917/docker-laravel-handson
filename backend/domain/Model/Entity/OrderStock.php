<?php

declare(strict_types=1);

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\OrderStockId;
use Domain\Model\ValueObject\OrderStockOrderId;
use Domain\Model\ValueObject\OrderStockStockId;

class OrderStock
{
    private $id;
    private $orderId;
    private $stockId;

    public function __construct(OrderStockId $orderStockId, OrderStockOrderId $orderStockOrderId, OrderStockStockId $orderStockStockId)
    {
        $this->id = $orderStockId;
        $this->orderId = $orderStockOrderId;
        $this->stockId = $orderStockStockId;
    }

    public function id(): OrderStockId
    {
        return $this->id;
    }

    public function orderId(): OrderStockOrderId
    {
        return $this->orderId;
    }

    public function stockId(): OrderStockStockId
    {
        return $this->stockId;
    }
}
