@extends('layouts.master')

@section('title')
    Picnook search page
@stop


@section('head')
    <link href="/css/search.css" type="text/css" rel='stylesheet'>
@stop

@section('content')
<p id="searchtest">test this </p>
 <form method='POST' action='/pic/search'>

    {{ csrf_field()}}

    <input type='text' name='searchTerm'>

    <input type='submit' value='Submit'>

</form>
   
@stop
 
@section('body')
    <script src="/js/search.js"></script>
@stop