
@extends('layouts.master')

@section('title')
    Picnook index page
@stop


@section('head')
    <link href="/css/picnook.css" type="text/css" rel='stylesheet'>
@stop

@section('content')
    <h2>see whats happening </h2>
    @foreach ($pics as $key=>$pic)
        <div class="img">
         {{++$key}}
        {{--<form method='POST' id="test" action='/create/{{$key}}'>
          {{ csrf_field()}}--}}
       
        {{--<input type="image" src={{$pic->link}} id='{{$key}}' value={{$key}}>--}}
       <a href="/create/{{$key}}"> <img src={{$pic->link}}> </a>  
        {{--<form method="get" action="/create/{{$key}}">--}
        {{--<input type="image" src={{$pic->link}} id='{{$key}}' value={{$key}}>--} 
         
       {{--<img src='{{$pic->link}}'>
       <input type="submit" value='Submit'>--}}
      
       
        </div>
        
    @endforeach
    {{--
    @if(sizeof($books)==0)
        You have not added any books, you can <a href='/book/create'>add a book now to get started</a>.
    @else
        
        <div id= "books" class='cf'>
            @foreach ($books as $book)
                 
            	<section class="book">
            		<a href="/books/{{$book->id}}">
                    <h2 class='truncate'>{{$book->title}}</h2></a>
                    <h3 class='truncate'>{{$book->author->first_name}} {{$book->author->last_name}}</h3>
            	    <img class='cover' src='{{$book->cover}}' alt='Cover for {{ $book->title}}'>
                    <br>
            	 
            		<a href="/books/{{$book->id}}/edit">
                    <i class ='fa fa-pencil'></i>edit</a>
            	   
                   <a href='/books/{{$book->id}}'><i class='fa fa-eye'></i> View</a>

                   <a href='/books/{{$book->id}}/delete'><i class = 'fa fa-trash'></i>Delete</a>
                   </section>

            	
                
            @endforeach
        </div>
      @endif
      --}}
@stop



@section('body')
    <script src="/js/picnook/index.js"></script>
 