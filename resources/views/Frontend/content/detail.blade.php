@forelse($detail->activeBlock as $key=>$det)
    @if($key<2)
        <div class="text-center detail" data-aos="{{$det->animation}}">
            <h3>{{$det->name??''}}</h3>

            <div class="row">
                @if(isset($det->imageData->title))
                    <div class="col-sm-3">
                        <img class="text-right" src="{{url('images/detail/'.$det->imageData->title)}}" alt="image">
                    </div>
                @endif
                @if(isset($det->quote))
                    <div class="col-sm-5">
                        <blockquote class="text-left">{{$det->quote??''}}</blockquote>
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

            <p>{{$det->detail??''}}</p>

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