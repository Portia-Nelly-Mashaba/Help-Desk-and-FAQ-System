<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forum;
use App\Models\Category;
use App\Models\Discussion;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        // show users online
        $user = new User;
        $users_online = $user->allOnline();
        $categoriesCount = count(Category::all());
        $forumsCount = count(Forum::all());
        $discussionCount = count(Discussion::all());
        $newMember = User::latest()->first();
        $totalMembers = count(User::all());

        $categories =Category::latest()->get();
        // return view('forum_user.firstpage', compact('categories'));
        return view('welcome', compact('categories', 'categoriesCount', 'forumsCount', 'discussionCount', 'totalMembers', 'newMember', 'users_online'));
    }

    public function categoryOverview($id){
        $category = Category::find($id);
         return view('forum_user.category', compact('category'));
    }

        //dd($id);

    public function forumOverview($id){
            $forum =Forum::find($id);
            return view('forum_user.new_forum_overview', compact('forum'));
    }
}
