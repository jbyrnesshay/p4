 
    @if(sizeof($pics) == 0)
        No results found.
    @endif

    @foreach($pic as $pic)
        <div class='pic'>
            <a href='/pic/show/{{$pic->id}}'>{{ $pic->title }}</a>
        </div>
    @endforeach
 