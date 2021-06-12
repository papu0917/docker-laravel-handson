<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

class StockImg
{
    private $value;

    public function __construct(string $value)
    {
        if ($value === "") {
            throw new Exception("画像を選択してください");
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function baseName(): string
    {
        return basename($this->value);
    }
}
