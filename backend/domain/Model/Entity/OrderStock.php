<?php

declare(strict_types=1);

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\OrderStockId;
use Domain\Model\ValueObject\OrderId;
use Domain\Model\ValueObject\StockId;

class OrderStock
{
    private $id;
    private $orderId;
    private $stockId;

    public function __construct(
        OrderStockId $orderStockId,
        OrderId $orderStockOrderId,
        StockId $orderStockStockId
    ) {
        $this->id = $orderStockId;
        $this->orderId = $orderStockOrderId;
        $this->stockId = $orderStockStockId;
    }

    public function id(): OrderStockId
    {
        return $this->id;
    }

    public function orderId(): OrderId
    {
        return $this->orderId;
    }

    public function stockId(): StockId
    {
        return $this->stockId;
    }
}
