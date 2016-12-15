<section id="wish">
<div id="wishlistcontainer">
 @if (Auth::check())
    <button id="options">options</button>
    <h2 id="listheading"> your picnook list: </h2>
   

     @foreach ($pics as $item)
     {{--dd({{$item->pivot->frame_thickness}});--}}    
     {{--<img class="wishitem" src = "{{$item->link}}" style="border-width:{{$item->pivot->frame_thickness}}; border-color: black; width: 50px; height: 50px">--}}
     <div class="wishcontainer">
    <form method="POST" class="deleteform" action='/pics/{{ $item->id }}'>
     {{ method_field('DELETE')}}
     {{ csrf_field() }}
    <input type="hidden" value = {{$item->id}}>

    <button type="submit" class="delete" value="delete">delete</button>
    </form>
    <a href="/pics/{{$item->id}}/edit" class="edit">  edit</a> 

     <?php $newvalue =($item->pivot->frame_thickness) / 3;
           ?>
        <div class="frame" style="border: {{$newvalue.'em'}} solid {{$item->pivot->frame_color}} ">
            <div class="padding">
            {{--}} <img class="wishitem" src = "{{$item->link}}" style="border: {{$item->pivot->frame_thickness."px"}} solid blue; width: 50px; height: 50px">--}}
                <img class="wishitem" alt = "{{$item->title}}" src = "{{$item->link}}" >
            </div>     
            </div>
            <button class="details">details</button>
            
    </div>
     @endforeach
     @endif
    
    </div>

</section>

