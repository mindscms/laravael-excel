<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $products = Product::take(100)->orderBy('id', 'desc')->get();
        return $products;
    }

    public function map($products): array
    {
        return [
            $products->name,
            $products->type_code,
            $products->description,
            $products->quantity,
            $products->price,
            $products->created_at->toDateString(),
        ];
    }

    public function headings(): array
    {
        return [
            'Name',
            'Type Code',
            'Description',
            'Quantity',
            'Price',
            'Data',
        ];
    }
}
