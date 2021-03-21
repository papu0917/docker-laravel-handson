<?php

namespace App\Dto;

use Illuminate\Database\Eloquent\Collection;

final class CartInfo
{
    private $carts;
    private $count;
    private $sum;

    public function __construct(
        Collection $carts,
        int $count,
        int $sum
    ) {
        $this->carts = $carts;
        $this->count = $count;
        $this->sum = $sum;
    }

    public function carts(): Collection
    {
        return $this->carts;
    }

    public function count(): int
    {
        return $this->count;
    }

    public function sum(): int
    {
        return $this->sum;
    }
}
