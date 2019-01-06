@extends('layouts.app')

@section('content')
    @foreach($discussions as $d)
        <div class="panel panel-default">
            <div class="panel-heading">
                <img src="{{asset($d->user->avatar)}}" alt="{{asset($d->user->avatar)}}" width="70px" height="70px">
            </div>
            <div class="panel-body">
                {{$d->content}}
            </div>
        </div>
    @endforeach
    <div class="text-center">
        {{$discussions->links()}}
    </div>
@endsection
