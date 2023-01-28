<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\str;



class categoryController extends Controller
{
    public function index()
    {
        //_Query Builder
        //$category = DB::table('categories')->get();

        //Eloquent
        $category= category::all();
        return view('category.index', compact('category'));
    }

    //__Create Method
    public function create()
    {
        return view('category.create');
    }

    //__Store method
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        //$category=new category;
        //$category->category_name=$request->category_name;
        //$category->category_slug=$request = str::of($request->category_name)->slug('-');
        //$category->save();

        category::insert([
            'category_name' =>$request->category_name,
            'category_slug' => str::of($request->category_name)->slug('-'),
        ]);

        return redirect()->back()->with('success', 'Successfully Inserted');

        
    }

    //__Edit method
    public function edit($id)
    {
        $data = DB::table('categories')->where('id', $id)->first();
        //$data= category::find($id);
        return view('category.edit', compact('data'));
    }

    //__Update method
    public function update(Request $request, $id)
    {
        $data = category::find($id);
        $data->update([
            'category_name'  =>$request->category_name,
            'category_slug' =>str::of($request->category_name)->slug('-'),
        ]);
        return redirect()->route('category.index');
    }
}
