<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

class StockName
{
    private $value;

    public function __construct(string $value)
    {
        if (is_nulll($value)) {
            throw new Exception("商品名を入力してください");
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
