<?php

namespace App\Usecases;

use App\Product;

/**
 * 利用者として、商品を追加する
 */
class UserAddProductUsecase
{
    public function __invoke($name)
    {
        Product::create([
            'name' => $name,
            'update_sequence_number' => 1,
        ]);
    }
}
