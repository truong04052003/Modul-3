<?php

namespace App\Exports;

use App\Models\Books;
use Maatwebsite\Excel\Concerns\FromCollection;

class BooksExport implements FromCollection
{
    public function collection()
    {
        return Books::all();
    }
    public function headings(): array {
        return [
            'STT',
            'Tên sách',
            'Mã sách',
            'Tác giả',    
            'Thể loại',    
            'Số trang',    
            'Năm sản xuất',    
            "Created",
            "Updated"
            
        ];
    }
 
    public function map($book): array {
        return [
            $book->id,
            $book->tensach,
            $book->code,
            $book->tacgia,
            $book->theloai,
            $book->sotrang,
            $book->namsanxuat,
            $book->updated_at
        ];
    }
}
