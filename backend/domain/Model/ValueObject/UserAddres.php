<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

class UserAddres
{
    private $value;

    public function __construct(string $value)
    {
        if (is_null($value)) {
            throw new Exception("お届け先を入力してください");
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
