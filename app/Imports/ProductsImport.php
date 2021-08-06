<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductsImport implements ToModel, WithChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'          => $row[0],
            'type_code'     => $row[1],
            'description'   => $row[2],
            'quantity'      => $row[3],
            'price'         => $row[4],
        ]);
    }

    public function chunkSize(): int
    {
        return 10000;
    }
}
