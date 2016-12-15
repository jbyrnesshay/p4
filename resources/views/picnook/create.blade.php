@extends('layouts.master')

@section('title')
    Picnook index page
@stop

@section('head')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="/css/picnook.css" type="text/css" rel='stylesheet'>
    <script src="/js/scripts.js"></script>
@stop

@section('content')
{{-- here starts display of wishlist--}}
    @include('picnook.wishlistcontainer')
   {{--here ends display of wishlist--}}
    <h2>current selection </h2>
    <section id="displayselection">
        <div id="frame">
            <div id="padding">
                <img id="currentbrowse" class="browse" alt="{{$pic->title}}" src={{$pic->link}}>
            </div>
        </div>
        @include('picnook.createform') 
       
        <div id="purchase"> 
            <form id="purchasepoint">
                <fieldset>
                    <span id="price">
                        $155.00
                    </span>
                    <label for="buy">purchase?</label>
                    <input type="submit" id="buy" name="buy" value="buy">
                </fieldset>
            </form>
        </div>
    </section>
@stop
 
@section('body')
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous">
    </script>
    <script src="http://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
@stop
     
 

