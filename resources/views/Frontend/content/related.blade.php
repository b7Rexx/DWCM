@forelse($related->activeBlock as $key=>$ad)
    @if($key<1)
<h3 class="text-right">Related</h3>
<hr>
@endif
@empty
@endforelse
@forelse($related->activeBlock as $key=>$advertisement)
    @if($key<2)
        <div class="bg-related related" data-aos="{{$advertisement->animation}}">
            <img src="{{url('images/upload/'.$advertisement->imageData->title)}}" alt="image">
            <h3>{{$advertisement->name??''}}</h3>
        </div>
    @endif
@empty

@endforelse