<?php

declare(strict_types=1);

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\StockId;

class Stock
{
    private $id;

    public function __construct(StockId $stockId)
    {
        $this->id = $stockId;
    }

    public function id(): StockId
    {
        return $this->id;
    }
}
