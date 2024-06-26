<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(20);

        return view('admin.category.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'title' => 'required|max:255|string',
            'desc' => 'required|max:255|string',
        ]);

        $category = new Category;
        $category->title = $request->title;
        $category->desc = $request->desc;
        $category->user_id = auth()->id();
        $category->save();
        Session::flash('message', 'Category Created Successful');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::find($id);
        //dd($category);
        return view('admin.category.view_category', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if($request->title){
            $category->title = $request->title;
        }
        if($request->desc){
            $category->desc = $request->desc;
        }

        $category->save();
        Session::flash('message', 'Category Updated Successful');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash('message', 'Category Deleted Successful');
        Session::flash('alert-class', 'alert-success');
        return back();
    }
}
