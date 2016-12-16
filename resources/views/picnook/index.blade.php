
@extends('layouts.master')

@section('title')
    Picnook index page
@stop

@section('head')
    <link href="/css/picnook.css" type="text/css" rel='stylesheet'>
    <link href="/css/searcn.css" type="text/css" rel='stylesheet'>
@stop

@section('content')
  <div id="mainpagecontainer">
    <div id="categoriesdiv">
      <form id="categoryform" name="categoryform" method="GET" action="/home">
      <label for ="category">categories:</label>
          <select id="category" name="category">
              <option selected>select one</option>
              <option value="recommended" id="recommended">recommended</option>
              <option value="landscapes" id="landscapes">landscapes</option>
              <option value="astronomy"   id="astronomy">astronomy</option>
              <option value="city"   id="city">city</option>
          </select>
      </form>
    </div>
    <div id="searchable">
      <h3>search by title or category</h3>
      <form method='POST' action='/pic/search'>
        {{ csrf_field()}}
        <input type='text' name='searchTerm'>
        <button type="submit" name="searchbutton" id="searchbutton" value="Submit">
          Search?
        </button>
      </form>
    </div>
    <section id="browsecontent">
      <h2>
        {{$category}} 
      </h2>  
      @foreach ($catalog_pics as $key=>$pic)
        <div class="img">
          <?php ++$key; ?>  
          <a href="/pics/create/{{$key}}"> <img class="index" alt="{{$pic->title}}" src="{{$pic->link}}"> </a>  <p class="title"> {{$pic->title}}</p>
        </div>
      @endforeach
    </section>
    <section id="information">
      <button id="openlist">See your wishlist?</button>  
      <div id="rtcontainer">
        <div id="pg1rightcontent">
          <h3>Section 1</h3>
          <p>
            Picnook is the foundation for an ecommerce simulation.  For the purposes of Assignment #4, it is lacking ecommerce features, however it provides a rough simulation of a customer browsing experience on an online pic-to-home-art site.  There is no buy function (but there is a buy button).
          </p>
          <h3>Section 2</h3>
          <p>Primary features are:</p>
            <ul>
              <li> home button in upper right of nav bar to return to front page at any time</li>
              <li> click photo select and land on create page </li>
              <li> ability to configure frame and mat size and color </li>
              <li> save the pic selection with the config options to a user wishlist</li>
              <li>edit and update the mat/frame size/color associated with the pic</li>
              <li>view wishlist inventory, integrated into create and update pages</li>
              <li>toggle wishlist with this text content on the homepage, using the button which reads "see your wishlist"</li>
              <li>select a demo category of images, to view images of only that category</li>
              <li>a demo of the search functionality introduced by Susan Buck in the written lectures, completely borrowed, all credit to her for this particular code</li>
              <li>search allows to search for title or category, very simple, not fleshed out in functionality</li>
              <li>user greeting by first name when user logged in</li>
            </ul>
          </div>
        @include('picnook.wishlistcontainer')
      </div> 
    </section>
  </div>     
@stop

@section('body')
    
 @stop
