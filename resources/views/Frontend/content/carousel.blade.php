<div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        @forelse($carousel->activeBlock as $key=>$car)
            <li data-target="#demo" data-slide-to="{{$key}}" class="{{$key==0?'active':''}}"></li>
        @empty
        @endforelse
    </ul>
    <div class="carousel-inner">
        @forelse($carousel->activeBlock as $key=>$car)
            <div class="carousel-item {{$key == 0?'active':''}}">
                <img src="{{url('images/carousel/'.$car->imageData->title)}}" alt="image">
                <div class="carousel-caption">
                    <h3>{{$car->name}}</h3>
                    <p>{{$car->quote}}</p>
                </div>
            </div>
        @empty
            <div class="carousel-item active">
                <img src="{{url('images/logo/'.$main['logo']??'')}}" alt="logo">
                <div class="carousel-caption">
                    <h2>{{$main['name']}}</h2>
                    <p>Add carousel image or Disable carousel !</p>
                </div>
            </div>
        @endforelse
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>