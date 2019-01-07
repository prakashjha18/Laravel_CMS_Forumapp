<?php

namespace App\Http\Controllers;
use App\Reply;
use App\Like;
use Auth;
use Session;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function like($id)
    {
        
        Like::create([
            'reply_id' => $id,
            'user_id'=> Auth::id()
        ]);

        Session::flash('success','You liked the reply.');
        return redirect()->back();
    }
    public function unlike($id)
    {
        $like = Like::where('reply_id',$id)->where('user_id',Auth::id())->first();
        $like->delete();
        Session::flash('success','you unliked the reply');
        return redirect()->back();
    }
}