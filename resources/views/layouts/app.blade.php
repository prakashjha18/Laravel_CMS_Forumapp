<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ThisForum</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
 
    <!-- Include Editor style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        ThisForum
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        
            @if($errors->count()>0)
                <ul class="list-group-item">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item text-danger">
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
                <br><br>
            @endif
        
        <div class="container">
            <div class="col-md-4">
                <a href="{{route('discussions.create')}}" class="form-control btn btn-primary">Create a new discussion</a>
                <br><br>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="/forum">Home</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/forum?filter=me">My discussion</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/forum?filter=solved">Solved discussion</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/forum?filter=unsolved">Unsolved discussion</a>
                            </li>
                        </ul>
                    </div>
                    @if(Auth::check())
                        @if(Auth::user()->admin)
                            <div class="panel-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                            <a href="/channels" >All channels</a>
                                    </li>
                                
                            
                            
                                        <li class="list-group-item">
                                                <a href="/channels/create" >Create Channels</a>
                                        </li>
                                    </ul>
                            </div>
                            
                        @endif
                    @endif
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Channels
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($channels as $channel)
                                <li class="list-group-item">
                                    <a href="{{route('channel',['slug' => $channel->slug])}} " >{{$channel->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
 
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/js/froala_editor.pkgd.min.js"></script>
 
    <!-- Initialize the editor. -->
    <script> $(function() { $('textarea').froalaEditor() }); </script>
</body>
</html>
