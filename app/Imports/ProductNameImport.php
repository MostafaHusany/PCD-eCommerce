<?php

namespace App\Imports;

use App\ProductName;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductNameImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProductName([
            'sku'     => $row[0],
            'name'    => $row[1], 
        ]);
    }
}
