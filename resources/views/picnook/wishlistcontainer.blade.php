<section id="wish">
    <div id="wishlistcontainer">
        @if (Auth::check())
            <button id="options">options</button>
            <h2 id="listheading"> your picnook list: </h2>
            @foreach ($pics as $item)
                <div class="wishcontainer">
                    <form method="POST" class="deleteform" action='/pics/{{ $item->id }}'>
                        {{ method_field('DELETE')}}
                        {{ csrf_field() }}
                        <input type="hidden" value = {{$item->id}}>
                        <button type="submit" class="delete" value="delete">delete</button>
                    </form>
                    <a href="/pics/{{$item->id}}/edit" class="edit">  edit</a> 
                    {{-- adjust numerical weight of frame size to render appropriately in small wishlist view--}}
                    <?php $newvalue =($item->pivot->frame_thickness) / 3;
                    ?>
                    <div class="frame" style="border: {{$newvalue.'em'}} solid {{$item->pivot->frame_color}} ">
                        <div class="padding">
                            <img class="wishitem" alt = "{{$item->title}}" src = "{{$item->link}}" >
                        </div>     
                    </div>
                 </div>
            @endforeach
        @endif
    </div>
</section>

