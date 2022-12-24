<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $items = Category::all();
        // $items = DB::table('categories')->get();
        // select * from categories
        // dd($items);
        return view('admin.categories.index', compact('items'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::find($id);
        // dd($product);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories.index');
    }
    //thùng rác
    public function garbagecan()
    {
        $softs = Category::onlyTrashed()->get();
        return view('admin.categories.soft', compact('softs'));
    }
    //khôi phục
    public function restore($id)
    {
        // dd($id);
        $softs = Category::withTrashed()->find($id);
        $softs->restore();
        return redirect()->route('categories.index');
    }
    //xóa vĩnh viễn
    public function deleteforever($id)
    {
        $softs = Category::withTrashed()->find($id);
        $softs->forceDelete();
        return redirect()->route('categories.garbagecan');
    }
}
