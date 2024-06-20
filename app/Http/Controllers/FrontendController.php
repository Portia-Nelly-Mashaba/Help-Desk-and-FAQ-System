<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forum;
use App\Models\Category;
use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Models\DiscussionReply;

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

        // Get the category
        $category = Category::find($id);

        // Get counts for the specific category
        $forumsCount = Forum::where('category_id', $id)->count();
        $discussionCount = Discussion::whereHas('forum', function ($query) use ($id) {
            $query->where('category_id', $id);
        })->count();
        $totalRepliesCount = DiscussionReply::whereHas('discussion.forum', function ($query) use ($id) {
            $query->where('category_id', $id);
        })->count();
        $totalLikesCount = DiscussionReply::whereHas('discussion.forum', function ($query) use ($id) {
            $query->where('category_id', $id);
        })->sum('likes');
        $totalDisikesCount = DiscussionReply::whereHas('discussion.forum', function ($query) use ($id) {
            $query->where('category_id', $id);
        })->sum('dislikes');

        $category = Category::find($id);
         return view('forum_user.category', compact('category', 'forumsCount', 'discussionCount', 'totalRepliesCount', 'totalLikesCount', 'totalDisikesCount'));
    }

        //dd($id);

    public function forumOverview($id){
            $forum =Forum::find($id);
            return view('forum_user.new_forum_overview', compact('forum'));
    }

    public function profile($id)
    {
        $latest_Posts = Discussion::where('user_id', id)->latest()->first();
        $latest = Discussion::lastest()->first();
        $user = User::find($id);
        return view('user_profile', compact('user'));
    }
}
