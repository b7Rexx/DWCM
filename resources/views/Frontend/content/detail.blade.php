@forelse($detail->activeBlock as $key=>$det)
    @if($key<2)
        <div class="text-center detail" data-aos="{{$det->animation}}">
            <h3>{{$det->name??''}}</h3>

            <div class="row">
                @if(isset($det->imageData->title))
                    <div class="col-sm-3">
                        <img class="text-right" src="{{url('images/upload/'.$det->imageData->title)}}" alt="image">
                    </div>
                @endif
                @if(isset($det->quote))
                    <div class="col-sm-5 text-left">
                        <blockquote>{{$det->quote??''}}</blockquote>
                        @if(isset($det->audioData->title))
                            <br>
                            <audio src="{{url('audio/'.$det->audioData->title??'')}}" controls
                                   style="width:100px;"></audio>
                        @endif
                    </div>
                @endif
                <?php $vid = $det->videoData->title ?? '';?>
                @if($vid !== '')
                    <div class="col-sm-4">
                        <embed height="120" width="150"
                               src="https://www.youtube.com/embed/{{$vid}}">
                    </div>
                @endif
            </div>
            <?php
            $uri = $det->content->nav->navbar->id . '/' . $det->content->nav->id . '/' . $det->id;
            echo "<p>" . substr($det->detail ?? '', 0, 50) . "<a href='" . url($uri) . "'> . . .See more</a></p>";
            ?>
        </div>
    @endif
@empty
    <div class="text-center detail">
        <h3>{{$main['name']??''}}</h3>

        <div class="row">
            <div class="col-sm-5">
                <img class="text-right" src="{{url('images/logo/'.$main['logo'])}}" alt="image">
            </div>
            <div class="col-sm-7">
                <blockquote class="text-left">{{$main['quote']??''}}</blockquote>
            </div>
        </div>

        <p>{{$main['email']??''}}<br>{{$main['phone']??''}}</p>

    </div>

@endforelse