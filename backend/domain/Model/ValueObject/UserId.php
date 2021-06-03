<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

class UserId
{
    private $value;

    public function __construct(int $value)
    {
        if ($value <= 0) {
            throw new Exception("ユーザーIdは1以上になります");
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
