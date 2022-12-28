<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index()
    {
        $items = Category::all();
        return view('admin.categories.index', compact('items'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'Không được để trống',
        ]);
        if ($validator->fails()) {
            return redirect()->route('categories.create')
                ->withErrors($validator)
                ->withInput();
        }
        $category = new Category();
        $category->name = $request->name;
        try {
            $category->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.create')->with('error', 'Da co loi xay ra');
        }
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
        $softs = Category::withTrashed()->find($id);
        $softs->restore();
        return redirect()->route('categories.index');
    }
    //xóa vĩnh viễn
    public function deleteforever($id)
    {
        $softs = Category::withTrashed()->find($id);
        $softs->forceDelete();
        return redirect()->route('categories.index');
    }
}
