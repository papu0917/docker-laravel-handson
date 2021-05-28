<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

class OrderStockOrderId
{
    private $value;

    public function __construct(int $value)
    {
        if ($value <= 0) {
            throw new Exception("オーダーIDは1以上で入力してください");
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
