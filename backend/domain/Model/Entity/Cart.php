<?php

declare(strict_types=1);

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\CartId;
use Domain\Model\ValueObject\StockId;
use Domain\Model\ValueObject\UserId;

class Cart
{
    private $id;
    private $stockId;
    private $userId;

    public function __construct(
        CartId $cartId,
        StockId $cartStockId,
        UserId $cartUserId
    ) {
        $this->id = $cartId;
        $this->stockId = $cartStockId;
        $this->userId = $cartUserId;
    }

    public function id(): CartId
    {
        return $this->id;
    }

    public function stockId(): StockId
    {
        return $this->stockId;
    }

    public function userId(): UserId
    {
        return $this->userId;
    }
}
