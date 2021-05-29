<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

class OrderEmail
{
    private $value;

    public function __construct(string $value)
    {
        if (is_null($value)) {
            throw new Exception("メールアドレスを入力してください");
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
