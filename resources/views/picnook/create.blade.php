@extends('layouts.master')

@section('title')
    Picnook index page
@stop


@section('head')
    <link href="/css/picnook.css" type="text/css" rel='stylesheet'>
@stop

@section('content')
<div id="wishlistcontainer">
    <h2> your list </h2>
    @if (Auth::check())
     @foreach ($list as $item)
     {{--dd({{$item->pivot->frame_thickness}});--}}    
     {{--<img class="wishitem" src = "{{$item->link}}" style="border-width:{{$item->pivot->frame_thickness}}; border-color: black; width: 50px; height: 50px">--}}
     <div class="wishcontainer">
     <?php $newvalue =($item->pivot->frame_thickness) / 3;
           ?>
        <div class="frame" style="border: {{$newvalue.'em'}} solid {{$item->pivot->frame_color}} ">
            <div class="padding">
            {{--}} <img class="wishitem" src = "{{$item->link}}" style="border: {{$item->pivot->frame_thickness."px"}} solid blue; width: 50px; height: 50px">--}}
                <img class="wishitem" src = "{{$item->link}}" >
            </div>     
            </div>
    </div>
     @endforeach
     @endif
     
    </div>
    <h2>current selection </h2>
    <section id="displayselection">
   <div id="frame">
   <div id="padding">
   <img id="currentbrowse" class="browse" src={{$pic->link}}>
   </div>
   </div>
   
    
   <div id="selectionoptions">
    <form method="POST" action="/store" >
        {{ csrf_field() }}
    <fieldset>
    <label for = "frameselect">select frame:</label>
    <select id ="frameselect" name='frameselect'>
    	<option id="black">black</option>
    	 
    	<option id="silver">silver</option>
    	<option value="#321414">seal brown</option>
    	<option value="#4f3A3c">dark puce</option>
    	<option value="#645452">wenge</option>
    	<option value="#4B3621">cafe noir</option>
    	<option value="DarkSlateGray">slate gray</option>
    </select>
    <label for ="matselect">select matting:</label>
    <select id="matselect" name='matselect'>
    	<option value="none">none</option>
    	<option value="white">white</option>
    	<option value="AntiqueWhite">antique white</option>
    	<option value="SeaShell">seashell</option>
    	<option value="OldLace">old lace</option>
    	<option value="MintCream">mint cream</option>
    	
    </select>
    </fieldset>
    <fieldset>
    <label for="framethick">select frame thickness</label>
    <input type ="range" id="framethick" name= 'framethick' min='.25' max='2' step='.25' value='.25'>
    <label for="matwidth">select mat width</label>
    <input type="range" id="matthick" name='matthick' min='.25' max ='2' step='.25' value='.25'>
    </fieldset>
    <fieldset>
    <input type="hidden" name='key' value={{$key}}>
    <label for = 'addwishlist'>add to wishlist?</label>
    <input type='submit' value="Submit" id="addwishlist">

    
    </fieldset>
    </form>    
    <div id="browse">
    
    <button id="keepbrowse"><a href="/home">keep browsing?</a></button>
    </a>
    </div>
    </div>
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
     
 

