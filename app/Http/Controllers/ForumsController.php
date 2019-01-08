<?php

namespace App\Http\Controllers;
use App\Discussion;
use Auth;
use App\Channel;
use Illuminate\Http\Request;
use illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    public function index()
    {
        switch (request('filter')) {
            case 'me':
                $results = Discussion::where('user_id',Auth::id())->paginate(3);
                break;
            case 'solved':
                $answered = array();
                foreach(Discussion::all() as $d)
                {
                    if($d->hasBestAnswer())
                    {
                        array_Push($answered,$d);
                    }
                }
                $results = new Paginator($answered,3);
                break;
            case 'unsolved':
                $unanswered = array();
                foreach(Discussion::all() as $d)
                {
                    if(!$d->hasBestAnswer())
                    {
                        array_Push($unanswered,$d);
                    }
                }
                $results = new Paginator($unanswered,3);
                break;
            default:
                $results = Discussion::orderBy('created_at','desc')->paginate(3);
                break;
        }
        //$discussions = Discussion::orderBy('created_at','desc')->paginate(3);
        return view('forum',['discussions' => $results]);
    }

    public function channel($slug)
    {
        $channel = Channel::where('slug',$slug)->first();
        return view('channel')->with('discussions',$channel->discussions()->paginate(5));
    }
}
