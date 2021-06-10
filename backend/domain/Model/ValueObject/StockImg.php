<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

class StockImg
{
    private $value;

    public function __construct($value)
    {
        if ($value === "") {
            throw new Exception("画像を選択してください");
        }
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }
}
