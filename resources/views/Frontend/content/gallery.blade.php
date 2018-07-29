@forelse($gallery->activeBlock as $key=>$gal1)
    @if($key<1)
        <h3>Gallery</h3>
        <hr>
    @endif
@empty
@endforelse
<div class="row">
    @forelse($gallery->activeBlock as $key=>$gal2)
        <div class="col-sm-6 col-md-4 bg-related" data-aos="{{$gal2->animation}}">
            <img src="{{url('images/gallery/'.$gal2->GalleryData[0]->title)}}" alt="image">
            <h3>{{$gal2->name??''}}</h3>
        </div>
    @empty

    @endforelse
</div>