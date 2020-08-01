<?php

namespace App\Usecases;

use App\Product;
use App\UpdateSequenceNumber;
use Illuminate\Support\Facades\DB;

/**
 * 利用者として、商品を削除する
 */
class UserDeleteProductUsecase
{
    public function __invoke($product_id)
    {
        DB::transaction(function () use ($product_id) {
            UpdateSequenceNumber::incrementUpdateCount();
            $update_count = UpdateSequenceNumber::value('update_count');

            $product = Product::findOrFail($product_id);
            $product->update(['update_count' => $update_count]);
            $product->delete();
        });
    }
}
