<?php

namespace App\Usecases;

use App\Product;
use App\UpdateSequenceNumber;
use Illuminate\Support\Facades\DB;

/**
 * 利用者として、商品を更新する
 */
class UserUpdateProductUsecase
{
    public function __invoke($product_id, $name)
    {
        DB::transaction(function () use ($product_id, $name) {
            $product = Product::findOrFail($product_id);

            UpdateSequenceNumber::incrementUpdateCount();
            $update_count = UpdateSequenceNumber::value('update_count');
            $product->update([
                'name' => $name,
                'update_count' => $update_count,
            ]);
        });
    }
}
