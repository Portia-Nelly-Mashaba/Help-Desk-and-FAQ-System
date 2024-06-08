<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $categories =Category::latest()->get();
        return view('welcome', compact('categories'));

    }

    public function categoryOverview($id){
        $category = Category::find($id);
         return view('forum_user.category', compact('category'));
    }

    public function forumOverview($id){
        $forum =Forum::find($id);
        return view('forum_user.forum_overview', compact('forum'));
    }
}
