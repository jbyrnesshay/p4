<!DOCTYPE html>
<html>
<head>
    <title>
        {{-- Yield the title if it exist, otherwise default to 'Picnook'--}}
        @yield('title', 'Picnook')
    </title>

    <meta charset='utf-8'>
    
    <!-- Latest compiled and minified CSS -->
<!--<script src="https://use.fontawesome.com/ea0bd51253.js"></script>-->
<link href="/css/picnook.css" id="mainstyles" type='text/css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the head --}}
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
        @else  <h2 id="ctrhead">your pics</h2> 
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
        {{--<ul>
            <li><a href="/books"> view all photos</a></li>
            <li><a href="/books/create"> create your piece </a></li>
        </ul>
            @if(Session::get('flash_message') != null)
                <div id="flash_message">
                {{Session::get('flash_message')}}
                </div>
            @endif--}}
    {{--Main page content will be yielded here--}}
    @yield('content')
    </section>
   

   {{--}} <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}
    

    {{-- Yield any page specific JS files or anything else you might want at end of body--}}
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
