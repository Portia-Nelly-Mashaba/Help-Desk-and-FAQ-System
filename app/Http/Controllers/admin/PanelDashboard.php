<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Forum;
use App\Models\Category;
use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelDashboard extends Controller
{
    public function home()
    {
        $categories = Category::latest()->paginate(15);
        $discussion = Discussion::latest()->paginate(15);
        $forums = Forum::latest()->paginate(15);
        $users = User::latest()->paginate(15);
        return view('admin.dashboard', compact('categories', 'discussion', 'forums', 'users' ));
    }

    public function show($id)
    {
        // $latest_Posts = Discussion::where('user_id', auth()->id())->latest()->first();
        // $latest = Discussion::latest()->first();
        $latest_Posts = Discussion::where('user_id', $id)
                              ->with(['reply'])
                              ->orderBy('created_at', 'desc')
                              ->get();
        $user = User::find($id);

        return view('admin.admin_users', compact('user', 'latest_Posts', 'id'));
    }

    public function destroy($id)
    {
        $user =User::find($id);
        $user->delete();
        toastr()->success('User deleted successfully');
        return back();
        //return view('admin.dashboard', compact('categories', 'discussion', 'forums', 'users' ));
    }

}
