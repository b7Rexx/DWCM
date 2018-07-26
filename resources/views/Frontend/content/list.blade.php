<br>
@forelse($list->activeBlock as $key=>$li)
    @if($key<1)
        <h2>
            {{$list->name??''}}
        </h2>
        <hr>

    @endif
@empty
@endforelse

<div class="row">
    @forelse($list->activeBlock as $key=>$lis)
        <div class="col-sm-6 col-md-4">
            <div class="text-center list" data-aos="{{$lis->animation}}">
                <h3>{{$lis->name??''}}</h3>

                @if(isset($lis->imageData->title))
                    <img class="text-right" src="{{url('images/list/'.$lis->imageData->title)}}"
                         alt="image">
                @endif
                @if(isset($lis->quote))
                    <blockquote class="text-left">{{$lis->quote??''}}</blockquote>
                @endif
                <?php $vid = $lis->videoData->title ?? '';?>
                @if($vid !== '')
                <embed height="120" width="150"
                       src="https://www.youtube.com/embed/{{$vid}}">
                @endif

                <p>{{substr($lis->detail??'',0,50)}}</p>

            </div>

        </div>
    @empty

    @endforelse
</div>
