@forelse($gallery->activeBlock as $key=>$gal1)
    @if($key<1)
        <h3>Gallery</h3>
        <hr>
    @endif
@empty
@endforelse
<div class="row">
    @forelse($gallery->activeBlock as $key=>$gal2)
        <div class="col-sm-6 col-md-4 gallery text-center" data-aos="{{$gal2->animation}}">
            <img src="{{url('images/gallery/'.$gal2->GalleryData[0]->title)}}"
                 onclick="openModal({{$gal2->id}});currentSlide(1)"
                 class="hover-shadow cursor">
            <h4><br>{{$gal2->name??''}}</h4>
        </div>

        <div id="myModal{{$gal2->id}}" class="modal">
            <span class="close cursor" onclick="closeModal({{$gal2->id}})">&times;</span>
            <div class="modal-content">
                @forelse($gal2->GalleryData as $dat1)
                    <div class="mySlides">
                        <div class="numbertext"><h3>{{$gal2->name}}</h3>
                            <blockquote>{{$gal2->quote??''}}</blockquote>
                        </div>
                        <img src="{{url('images/gallery/'.$dat1->title)}}">
                    </div>
                @empty
                @endforelse
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                {{--<div class="caption-container">--}}
                {{--<p id="caption"></p>--}}
                {{--</div>--}}
                <div class="row">
                    @forelse($gal2->GalleryData as $key => $dat2)
                        <div class="col-sm-4 col-md-2 p-3">
                            <img class="demo cursor" src="{{url('images/gallery/'.$dat2->title)}}"
                                 onclick="currentSlide({{++$key}})">
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    @empty

    @endforelse
</div>

