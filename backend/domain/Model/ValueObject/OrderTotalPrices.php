<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

class OrderTotalPrices
{
    private $value;

    public function __construct(int $value)
    {
        if ($value <= 0) {
            throw new Exception("合計金額は1以上になります");
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
