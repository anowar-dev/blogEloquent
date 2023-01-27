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

        $category=new category;
        $category->category_name=$request->category_name;
        $category->category_slug=$request = str::of($request->category_name)->slug('-');
        $category->save();
        return redirect()->back()->with('success', 'Successfully Inserted');

        
    }
}
