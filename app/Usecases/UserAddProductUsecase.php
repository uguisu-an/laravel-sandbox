<?php

namespace App\Usecases;

use App\Product;
use App\UpdateSequenceNumber;
use Illuminate\Support\Facades\DB;

/**
 * 利用者として、商品を追加する
 */
class UserAddProductUsecase
{
    public function __invoke($name)
    {
        DB::transaction(function () use ($name) {
            UpdateSequenceNumber::incrementUpdateCount();
            $update_count = UpdateSequenceNumber::value('update_count');
            Product::create([
                'name' => $name,
                'update_count' => $update_count,
            ]);
        });
    }
}
