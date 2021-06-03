<?php

declare(strict_types=1);

namespace App\Adapter\Repository;

use App\Models\Stock;
use Domain\Model\Entity\Stock as StockEntity;
use Domain\Model\ValueObject\StockId;

class StockRepository
{
    public function save(StockEntity $stock)
    {
        $saveData['name'] = $stock->name()->value();
        $saveData['detail'] = $stock->detail()->value();
        $saveData['fee'] = $stock->fee()->value();
        $saveData['imgpath'] = "";

        $newStock = new Stock;
        return $newStock->fill($saveData)->save();
    }

    public function findById(StockId $stockId)
    {
    }
}
