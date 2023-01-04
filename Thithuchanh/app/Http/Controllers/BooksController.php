<?php

namespace App\Http\Controllers;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;
class BooksController extends Controller
{
 
    public function index()
    {
        $items = Books::paginate(4);
        if($key =request()->key){
            $items = Books::all()->where('tensach','like','%'.$key.'%');
        }
        return view('books.index', compact('items'));
    }

  
    public function create()
    {
        $items = Books::all();
        return view('books.create', compact('items'));
    }

 
    public function store(Request $request)
    {
          // // Validation 
          $validator = Validator::make($request->all(), [
            'tensach' => 'required',
            'code' => 'required',
            'tacgia' => 'required',
            'theloai'=>'required',
            'sotrang'=>'required',
            'namsanxuat'=>'required',
        ], [
            'tensach.required' => 'Không được để trống',
            'code.required' => 'Không được để trống',
            'tacgia.required' => 'Không được để trống',
            'theloai.required' => 'Không được để trống',
            'sotrang.required' => 'Không được để trống',
            'namsanxuat.required' => 'Không được để trống'
        ]);
        if ($validator->fails()) {
            return redirect()->route('books.create')
                ->withErrors($validator)
                ->withInput();
        }
        // Luu
        $book = new Books();
        $book->tensach = $request->tensach;
        $book->code = $request->code;
        $book->tacgia = $request->tacgia;
        $book->theloai = $request->theloai;
        $book->sotrang = $request->sotrang;
        $book->namsanxuat = $request->namsanxuat;
        

        try {
            $book->save(); 
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('books.create')->with('error', 'Da co loi xay ra');
        }
        return redirect()->route('books.index');

    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $book = Books::find($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Books::find($id);
        $book->tensach = $request->tensach;
        $book->code = $request->code;
        $book->tacgia = $request->tacgia;
        $book->theloai = $request->theloai;
        $book->sotrang = $request->sotrang;
        $book->namsanxuat = $request->namsanxuat;
        $book->save();
        return redirect()->route('books.index');
    }

 
    public function destroy($id)
    {
        $book = Books::find($id);
        $book->delete();
        return redirect()->route('books.index');
    }
    public function excel()
    {
        return Excel::download(new BooksExport,'books.xlsx');
    }
}
