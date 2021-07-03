<?php

declare(strict_types=1);

namespace App\Adapter\Repository;

use App\Models\Stock;
use Domain\Model\Entity\Stock as StockEntity;
use Domain\Model\ValueObject\StockId;
use Domain\Model\ValueObject\StockImg;

class StockRepository
{
    public function save(StockEntity $stock)
    {
        $saveData['id'] = ($stock->id()) ? $stock->id()->value() : null;
        $saveData['name'] = $stock->name()->value();
        $saveData['detail'] = $stock->detail()->value();
        $saveData['fee'] = $stock->fee()->value();
        $saveData['imgpath'] = $stock->img()->baseName();
        $newStock = new Stock;

        return $newStock->fill($saveData)->save();
    }

    public function update(StockEntity $stock)
    {
        $saveData['id'] = $stock->id()->value();
        $saveData['name'] = $stock->name()->value();
        $saveData['detail'] = $stock->detail()->value();
        $saveData['fee'] = $stock->fee()->value();
        $saveData['imgpath'] = $stock->img()->baseName();
        $updatedStock = Stock::find($stock->id()->value());

        return $updatedStock->update($saveData);
    }

    public function findById(StockId $stockId)
    {
        $findById = Stock::find($stockId->value());

        return $findById;
    }

    public function findAll()
    {
    }
}
