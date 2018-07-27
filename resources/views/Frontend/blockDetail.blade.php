@section('title')
    @if(empty($main['short_name']))
        {{$main['name']}}
    @else
        {{$main['short_name']??$main['name']}}
    @endif
    - Detail >
    {{$block[0]->name??''}}
@endsection


@include('Frontend.Includes.header')

@include('Frontend.Includes.nav')

{{-- BODY CONTAINER--}}
<div class="container bg-main">

    <div class="row">
        @forelse($block as $key=>$det)
            <div class="text-center detail-block" data-aos="{{$det->animation}}">
                <h3>{{$det->name??''}}</h3>
                <br>
                @if(isset($det->quote))
                    <div class="row">
                        <blockquote>{{$det->quote??''}}</blockquote>
                        @if(isset($det->audioData->title))
                            <br>
                            <audio src="{{url('audio/'.$det->audioData->title??'')}}" controls
                                   style="width:100px;"></audio>
                        @endif
                    </div>
                @endif
                <hr>
                <div class="row">
                    @if(isset($det->imageData->title))
                        <div class="col-sm-6">
                            <img class="text-right" src="{{url('images/upload/'.$det->imageData->title)}}" alt="image">
                        </div>
                    @endif
                    <br>
                    <br>

                    <?php $vid = $det->videoData->title ?? '';?>
                    @if($vid !== '')
                        <div class="col-sm-6">
                            <embed width="80%" src="https://www.youtube.com/embed/{{$vid}}">
                        </div>
                    @endif
                </div>
                <br>
                <?php
                $uri = $det->content->nav->navbar->id . '/' . $det->content->nav->id . '/' . $det->id;
                echo "<p>" . $det->detail ?? '' . "<a href='" . url($uri) . "'> . . .See more</a></p>";
                ?>
            </div>
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
    </div>
</div>


@include('Frontend.Includes.footer')