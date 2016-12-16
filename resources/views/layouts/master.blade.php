<!DOCTYPE html>
<html>
    <head>
        <title>
            {{-- Yield the title if it exist, otherwise default to 'Picnook'--}}
            @yield('title', 'Picnook')
        </title>
        <meta charset='utf-8'>
            <link href="/css/picnook.css" id="mainstyles" type='text/css' rel='stylesheet'>
        @yield('head')
    </head>
    <body>
        <header id="top">
            <div id="transp">
                <h1><i class="fa fa-home"></i>PICNOOK</h1>
            </div>
            <div id="headimage">
                @if(Session::get('flash_message') != null)
                         <div id="flash_message">
                        {{Session::get('flash_message')}}
                     </div>

                @elseif (count($errors) > 0)
                    <div class="error">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @else 
                    <h2 id="ctrhead">Pics for your home</h2> 
                @endif
           </div>
            <nav>
                <ul>
                    @if (!(Auth::check()))
                    <li><a href="/register">register</a></li>
                    <li><a href="/login">sign in</a></li>
                    @else 
                        <li id="greeting">
                        {{'hi '.$user->first_name."!"}}
                        </li>
                    <li><a href="/logout">sign out</a></li>
                    @endif
                    <li><a href="/">home</a></li>
                </ul>
            </nav>
        </header>
        <section>
            @yield('content')
        </section>
        @yield('body')
         <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
            <script src="/js/scripts.js"></script>
         <footer>
            &copy; {{ date('Y') }}
        </footer>
    </body>
</html>
