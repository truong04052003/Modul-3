<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    
    public function collection()
    {
        return Product::all();
    }
    public function headings(): array {
        return [
            'ID',
            'Name',
            'Price',    
            "Created",
            "Updated"
            
        ];
    }
 
    public function map($product): array {
        return [
            $product->id,
            $product->name,
            $product->price,
            $product->created_at,
            $product->updated_at
        ];
    }
}
