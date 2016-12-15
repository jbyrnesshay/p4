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
   <div id="eframe">
   <div id="epadding">
   <img id="currentbrowse" class="browse" src={{$pic_info->link}}>
   </div>
   </div>
    
   
    
   <div id="selectionoptions">
    <form method="POST" action="/pics/{{$id}}" >
        {{ csrf_field() }}
        {{ method_field('PUT')}}
    <fieldset>
    
    <input type="hidden" value={{$pic_config->frame_color}} id="eframecolor">
    <input type="hidden" value={{$pic_config->mat_color}} id="ematcolor">

    <input type="hidden" value={{$pic_config->id}} name='id'>

    <label for = "eframeselect">select frame:</label>
   <select id ="eframeselect" name='eframeselect'>
    	<option value="black" >black</option>
    	 
    	<option value="silver">silver</option>
    	<option value="#321414" >seal brown</option>
    	<option value="#4f3A3c">dark puce</option>
    	<option value="#645452">wenge</option>
    	<option value="#4B3621">cafe noir</option>
    	<option value="DarkSlateGray">slate gray</option>
    </select>
    
    <label for ="ematselect">select matting:</label>
    <select id="ematselect" name='matselect'>
    	<option value="none">none</option>
    	<option value="white">white</option>
    	<option value="AntiqueWhite">antique white</option>
    	<option value="SeaShell">seashell</option>
    	<option value="OldLace">old lace</option>
    	<option value="MintCream">mint cream</option>
    	
    </select>
    </fieldset>
    <fieldset>
    <label for="eframethick">select frame thickness</label>
    <input type ="range" id="eframethick" name= 'eframethick' min='0.25' max=3 step='0.25' value={{$pic_config->frame_thickness}}>
    <label for="ematwidth">select mat width</label>
    <input type="range" id="ematthick" name='ematthick' min='0.2' max =3 step='0.25' value={{$pic_config->mat_thickness}}>
    </fieldset>
    <fieldset>
    {{--<input type="hidden" name='key' value=""}>--}}
    <input type="hidden" name="cost" value="155.00">
    <label for = 'savechanges'>save your changes?</label>
    <input type='submit' value="SAVE" id="savechanges">
    
    
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
 
<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
       <!-- <script src="http://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>-->
@stop
     
 

