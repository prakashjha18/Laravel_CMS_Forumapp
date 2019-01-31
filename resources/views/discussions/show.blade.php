@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <img src="{{asset($d->user->avatar)}}" alt="{{asset($d->user->avatar)}}" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
            <span>{{$d->user->name}},<b>({{ $d->user->points}})</b></span>
            
            @if($d->hasBestAnswer())
                <span class="btn btn pull-right btn-success btn-xs">closed</span>
            @else
                <span class="btn btn pull-right btn-danger btn-xs">open</span>
            @endif
            @if(Auth::id() == $d->user->id)
                @if(!$d->hasBestAnswer())
                    <a href="{{route('discussions.edit',['slug' => $d->slug])}}" class="btn btn-info btn-xs pull-right" style="margin-right: 8px;">Edit</a>
                @endif
            @endif
            @if($d->is_being_watched_by_auth_user())
                <a href="{{route('discussion.unwatch',['id' => $d->id])}}" class="btn btn-default btn-xs pull-right" style="margin-right: 8px;">UnWatch</a>
            @else
                <a href="{{route('discussion.watch',['id' => $d->id])}}" class="btn btn-default btn-xs pull-right" style="margin-right: 8px;">Watch</a>
            @endif
        </div>
        <div class="panel-body">
            <h4 class="text-center">
                <b>{{$d->title}}</b>
            </h4>
            <hr>
            @if($d->featured != '')
            <img src="{{asset("$d->featured")}}" width="400px" height="400px"><hr>
            @endif
            <p>
                {!!$d->content!!}
            </p>
            <hr>
            @if($best_answer)
                <div  style="padding: 2px">
                    <h3 class="text-center">Best Answer</h3>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <img src="{{asset($best_answer->user->avatar)}}" alt="{{asset($d->user->avatar)}}" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                            <span>{{$best_answer->user->name}}<b>({{ $best_answer->user->points}})</b></span>
                        </div>
                        <div class="panel-body">
                            {!!$best_answer->content!!}
                        </div>
                    </div>
                </div>
                @endif
        </div>
        <div class="panel-footer">
                <span>
                    {{$d->replies->count()}} Replies
                </span>
                <a href="{{route('channel',['slug' => $d->channel->slug])}}"class="pull-right btn btn-default btn-xs">{{$d->channel->title}}</a>
        </div>
    </div>
    @foreach($d->replies as $r)
    <div class="panel panel-default">
        <div class="panel-heading">
            <img src="{{asset($r->user->avatar)}}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
            <span>{{$r->user->name}}<b>({{ $r->user->points}})</b></span>
            @if(!$best_answer)
                @if(Auth::id() ==$d->user->id || Auth::id() == 1)
                    <a href="{{route('discussion.best.answer',['id' => $r->id])}}" class="btn btn-xs btn-primary pull-right" style="margin-left: 8px;">Mark as best answer</a>
                @endif
            @endif
                    @if(Auth::id() == $r->user->id)
                        @if(!$r->best_answer)
                            <a href="{{route('reply.edit',['id' => $r->id])}}" class="btn btn-xs btn-info pull-right">Edit</a>
                        @endif
                    @endif
                
        </div>
        <div class="panel-body">
            <p class="text-center">
                {!!$r->content!!}
            </p>
            <hr>
        </div>
        <div class="panel-footer">
            @if($r->is_liked_by_auth_user())
                <a href="{{route('reply.unlike',['id' => $r->id])}}" class="btn btn-danger btn-xs">Unlike <span class="badge">{{$r->likes->count()}}</span></a>
            @else
                <a href="{{route('reply.like',['id' => $r->id])}}" class="btn btn-success btn-xs">Like <span class="badge">{{$r->likes->count()}}</span></a>
            @endif
        </div>
    </div>
    @endforeach
    <div class="panel panel-default">
        <div class="panel-body">
            @if(Auth::check())
                <form action = "{{route('discussion.reply',['id' => $d->id])}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="reply">Leave a reply....</label>
                        <textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn pull-right">Leave a reply</button>
                    </div>
                </form>
            @else
                <div class="text-center">
                    <h2>Sign in to leave a reply</h2>
                </div>
            @endif
        </div>
    </div>
@endsection
