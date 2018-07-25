@forelse($ads->block as $key=>$advertisement)
    <div class="bg-danger">
        <img src="{{url('images/ads/'.$advertisement->imageData->title)}}" alt="image">
        <h3>{{$ads->name}}</h3>
        <br>
        {{$advertisement->imageData->title}}
        <hr>
        <h3>{{$ads->quote}}</h3>
    </div>
@empty

@endforelse