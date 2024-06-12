<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Models\DiscussionReply;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $forums = Forum::latest()->get();
        $forum = Forum::find($id);
        return view('forum_user.new_post', compact('forums', 'forum'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $notify = 0;

        if ($request->has('notify') && $request->notify == "on") {
            $notify = 1;
        };

        $discussion = new Discussion;
        $discussion->title = $request->title;
        $discussion->desc = $request->desc;
        $discussion->forum_id = $request->forum_id;
        $discussion->user_id = auth()->id();
        $discussion->title = $request->title;
        $discussion->notify = $notify;

        $discussion->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $forum = Forum::with('discussions')->find($id);
        // if (!$forum) {
        //     // Handle the case when the forum is not found
        //     abort(404);
        // }

        $discussion = Discussion::find($id);
        if ($discussion){
            $discussion->increment('views', 1);
        }
        return view('forum_user.post', compact('discussion'));
    }

     /**
     * Reply the form for editing the specified resource.
     */
    public function reply(Request $request, $id)
    {
        $reply = new DiscussionReply;
        $reply->desc =$request->desc;
        $reply->user_id = auth()->id();
        $reply->discussion_id = $id;

        $reply->save();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
