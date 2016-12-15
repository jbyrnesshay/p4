
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
          <a href="/pics/create/{{$key}}"> <img class="index" alt="{{$pic->title}}" src="{{$pic->link}}"> </a>  
        </div>
      @endforeach
    </section>
    <section id="information">
      <button id="openlist">See your wishlist?</button>  
      <div id="rtcontainer">
        <div id="pg1rightcontent">
          <h3>Section 1</h3>
          <p>
            Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
            ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
            amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
            odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
          </p>
          <h3>Section 2</h3>
          <p>
            Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
            purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
            velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
            suscipit faucibus urna.
          </p>
          <h3>Section 3</h3>
          <p>
            Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
            Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
            ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
            lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
          </p>
          <ul>
            <li>List item one</li>
            <li>List item two</li>
            <li>List item three</li>
          </ul>
          <h3>Section 4</h3>
          <p>
            Cras dictum. Pellentesque habitant morbi tristique senectus et netus
            et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
            faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
            mauris vel est.
          </p>
          <p>
            Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
            inceptos himenaeos.
          </p>  
        </div>
        @include('picnook.wishlistcontainer')
      </div> 
    </section>
  </div>     
@stop

@section('body')
    
 @stop
