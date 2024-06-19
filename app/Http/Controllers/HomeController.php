<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Models\DiscussionReply;

class HomeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $latest_Posts = Discussion::where('user_id', auth()->id())->latest()->first();
        $latest = Discussion::latest()->first();
        return view('user_home', compact('latest_Posts', 'latest'));
    }


}
