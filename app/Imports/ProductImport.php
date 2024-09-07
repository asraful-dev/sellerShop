<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name_en' => $row[0],
            'brand_id' => $row[1],
            'category_id' => $row[2],
            'subcategory_id' => $row[3],
            'subsubcategory_id' => $row[4],
            'purchase_price' => $row[5],
            'wholesell_price' => $row[6],
            'wholesell_minimum_qty' => $row[7],
            'regular_price' => $row[8],
            'discount_price' => $row[9],
            'discount_type' => $row[10],
            'product_code' => $row[11],
            'minimum_buy_qty' => $row[12],
            'stock_qty' => $row[13],
            'description_en' => $row[14],
            'slug' => $row[0],
        ]);
    }
}
