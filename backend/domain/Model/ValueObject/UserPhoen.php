<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

class UserPhone
{
    private $value;

    public function __construct(string $value)
    {
        if (is_null($value)) {
            throw new Exception("電話番号を入力してください");
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
