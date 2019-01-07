@extends('layouts.app')

@section('content')
    @foreach($discussions as $d)
        <div class="panel panel-default">
            <div class="panel-heading">
                <img src="{{asset($d->user->avatar)}}" alt="{{asset($d->user->avatar)}}" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                <span>{{$d->user->name}},<b>{{ $d->created_at->diffForHumans()}}</b></span>
                <a href="{{route('discussion',['slug' => $d->slug])}}" class="btn btn-default pull-right">View</a>
            </div>
            <div class="panel-body">
                <h4 class="text-center">
                    <b>{{$d->title}}</b>
                </h4>
                <p class="text-center">
                    {{str_limit($d->content,50)}}
                </p>
            </div>
            <div class="panel-footer">
                <p>
                    {{$d->replies->count()}} Replies
                </p>
            </div>
        </div>
    @endforeach
    <div class="text-center">
        {{$discussions->links()}}
    </div>
@endsection