<?php

namespace App\Http\Controllers;
use App\Discussion;
use App\Reply;
use Auth;
use Session;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{
    public function create()
    {
        return view('discuss');
    }

    public function store()
    {
        $r = request();
        $this->validate($r,[
            'channel_id' => 'required',
            'content' => 'required',
            'title' => 'required'
        ]);
        $discussion = Discussion::create([
            'title' => $r->title,
            'content' => $r->content,
            'channel_id' => $r->channel_id,
            'user_id' => Auth::id(),
            'slug' => str_slug($r->title)
        ]);
        Session::flash('success','Discussion Successfully created');
        return redirect()->route('discussion',['slug' => $discussion->slug]);
    }

    public function show($slug)
    {
        return view('discussions.show')->with('d',Discussion::where('slug',$slug)->first());
    }
    public function reply($id)
    {
        $d = Discussion::find($id);
        $reply = Reply::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => request()->reply
        ]);
        Session::flash('success','Replies to discussion.');
        return redirect()->back();
    }
}
