<!DOCTYPE html>
<html>
<head>
    <title>
        {{-- Yield the title if it exist, otherwise default to 'Picnook'--}}
        @yield('title', 'Picnook')
    </title>

    <meta charset='utf-8'>
    
    <!-- Latest compiled and minified CSS -->
<script src="https://use.fontawesome.com/ea0bd51253.js"></script>
<link href="/css/picnook.css" type='text/css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the head --}}
    @yield('head')

</head>
<body>
    <header>
        <div id="transp">
        <h1>PICNOOK</h1>
 </div>
        <img
        src="{{url('/images/frames_pexels_107911.jpg')}}"

         
        alt='Picnook Logo'>

    <nav>

        
        
        <ul>
            
            @if (!(Auth::check()))

            <li><a href="/login">sign in</a></li>
            @else 
             <span id="greeting">
            @if (isset($name))
            {{"hi ".$name."!"}}
             @endif
            </span>
            <li><a href="/logout">sign out</a></li>
            @endif
            <li><a href="/">home</a></li>
            <li><a href="http://google.com/">google</a></li>
            
        </ul>
    </nav>
    </header>
    
    <section>
   <ul>
        <li><a href="/books"> view all photos</a></li>
        <li><a href="/books/create"> create your piece </a></li>
    </ul>
        @if(Session::get('flash_message') != null)
                 <div id="flash_message">
             
                {{Session::get('flash_message')}}
             </div>
        @endif
   
     
        {{--Main page content will be yielded here--}}
        @yield('content')

    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

   {{--}} <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}
    

    {{-- Yield any page specific JS files or anything else you might want at end of body--}}
    @yield('body')
     <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
        <script src="/js/scripts.js"></script>
    </body>
</html>
