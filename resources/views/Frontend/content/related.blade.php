@forelse($related->activeBlock as $key=>$ad)
<h3 class="text-right">Related</h3>
<hr>
@empty
@endforelse
@forelse($related->activeBlock as $key=>$advertisement)
    @if($key<2)
        <div class="bg-related related">
            <img src="{{url('images/related/'.$advertisement->imageData->title)}}" alt="image">
            <h3>{{$advertisement->name??''}}</h3>
        </div>
    @endif
@empty

@endforelse