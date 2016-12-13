 
    @if(sizeof($pics) == 0)
        No results found.
    @endif

    @foreach($pics as $pic)
        <div class='pic'>
           {{--}} <a href='/pic/show/{{$pic->id}}'>{{ $pic->title }}</a>--}}
              <img src ='{{$pic->link}}'>{{ $pic->title }}</a>
        </div>
    @endforeach
 