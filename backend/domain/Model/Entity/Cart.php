<?php

declare(strict_types=1);

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\CartId;
use Domain\Model\ValueObject\CartStockId;
use Domain\Model\ValueObject\CartUserId;

class Cart
{
    private $id;
    private $stockId;
    private $userId;

    public function __construct(CartId $cartId, CartStockId $cartStockId, CartUserId $cartUserId)
    {
        $this->id = $cartId;
        $this->stockId = $cartStockId;
        $this->userId = $cartUserId;
    }

    public function id(): CartId
    {
        return $this->id;
    }

    public function stockId(): CartStockId
    {
        return $this->stockId;
    }

    public function userId(): CartUserId
    {
        return $this->userId;
    }
}
