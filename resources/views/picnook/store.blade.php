@extends('layouts.master')

@section('title')
    Picnook index page
@stop

@section('head')
    <link href="/css/picnook.css" type="text/css" rel='stylesheet'>
@stop

@section('content')
    <div id="storage">
    <div id="wishlistcontainer">
        @foreach ($list as $item)
            <img class="wishitem" src = {{$item->link}}>
        @endforeach
    </div>
    </div>
@stop
 
@section('body')
@stop  
