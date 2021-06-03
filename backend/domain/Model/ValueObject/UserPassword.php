<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

class UserPassword
{
    private $value;

    public function __construct(string $value)
    {
        if (is_null($value)) {
            throw new Exception("パスワードを入力してください");
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
