<?php

declare(strict_types=1);

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\StockDetail;
use Domain\Model\ValueObject\StockFee;
use Domain\Model\ValueObject\StockId;
use Domain\Model\ValueObject\StockImg;
use Domain\Model\ValueObject\StockName;

class Stock
{
    private $id;
    private $name;
    private $detail;
    private $fee;
    private $img;

    public function __construct(
        ?StockId $stockId,
        StockName $stockName,
        StockDetail $stockDetail,
        StockFee $stockFee,
        ?StockImg $stockImg
    ) {
        $this->id = $stockId;
        $this->name = $stockName;
        $this->detail = $stockDetail;
        $this->fee = $stockFee;
        $this->img = $stockImg;
    }

    public function id(): ?StockId
    {
        return $this->id;
    }

    public function name(): StockName
    {
        return $this->name;
    }

    public function detail(): StockDetail
    {
        return $this->detail;
    }

    public function fee(): StockFee
    {
        return $this->fee;
    }

    public function img(): ?StockImg
    {
        return $this->img;
    }
}
