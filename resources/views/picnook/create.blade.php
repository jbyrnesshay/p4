@extends('layouts.master')

@section('title')
    Picnook index page
@stop


@section('head')
    <link href="/css/picnook.css" type="text/css" rel='stylesheet'>
@stop

@section('content')
    <h2>your thing </h2>
   <div id="frame">
   <img id="currentbrowse" src={{$pic->link}}>
   </div>
    <form>
    <label for = "frameselect">select frame:</label>
    <select id ="frameselect">
    	<option id="black">black</option>
    	 
    	<option id="silver">silver</option>
    	<option value="#321414">seal brown</option>
    	<option value="#4f3A3c">dark puce</option>
    	<option value="#645452">wenge</option>
    	<option value="#4B3621">cafe noir</option>
    	<option value="DarkSlateGray">slate gray</option>
    </select>
    <label for ="matselect">select matting:</label>
    <select id="matselect">
    	<option value="white">white</option>
    	<option value="AntiqueWhite">antique white</option>
    	<option value="SeaShell">seashell</option>
    	<option value="OldLace">old lace</option>
    	<option value="MintCream">mint cream</option>
    	
    </select>
@stop
 


@section('body')
    <script src="/js/picnook/index.js"></script>
 

