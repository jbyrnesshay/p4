 
@extends('layouts.master')

@section('title')
    Picnook index page
@stop

@section('head')
    <link href="/css/picnook.css" type="text/css" rel='stylesheet'>
@stop
@section('content')
{{-- this is Susan Buck's code, attributed to Susan Buck, Harvard University--}}
  <div id="mainpagecontainer">
    @if(sizeof($pics) == 0)
        No results found.
    @endif
    @foreach($pics as $pic)
      <div class='searchresult'>
        <img src ='{{$pic->link}}'>
        <h3>title: </h3><span> {{$pic->title}}</span><br>
        <h3>category: </h3><span> {{$pic->category}}</span>
      </div>
    @endforeach
  </div>
@stop
@section('body')
    <script ></script>
@stop
 


 