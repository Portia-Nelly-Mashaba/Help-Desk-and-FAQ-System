<?php

namespace App\Http\Controllers\admin;

use App\Models\Forum;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forums = Forum::latest()->paginate(20);

        return view('admin.forum.forums', compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.forum.add_forum', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Forum::create($request->all());
        Session::flash('message', 'Forum Created Successfully');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $forums = Forum::find($id);
        // return view('admin.forum.view_forum', compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $forum  = Forum::find($id);
        $categories = Category::latest()->get();
        return view('admin.forum.edit_forum', compact('forum', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $forum = Forum::find($id);
        $forum->update($request->all());
        Session::flash('message', 'Forum Updated Successfully');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $forum =Forum::find($id);
        $forum->delete();
        Session::flash('message', 'Forum Deleted Successfully');
        Session::flash('alert-class', 'alert-success');
        return back();
    }
}
