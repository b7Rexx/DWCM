@section('title')
    @if(empty($main['short_name']))
        {{$main['name']}}
    @else
        {{$main['short_name']??$main['name']}}
    @endif
    - Search > {{$key??''}}
@endsection


@include('Frontend.Includes.header')

@include('Frontend.Includes.nav')

{{-- BODY CONTAINER--}}
<div class="container bg-main">
    <br>
    <div class="row">
        <h4>Search result on term "{{$key}}"</h4>
    </div>
    <hr>
    <div class="row">
        @forelse($searchList as $key=>$item)
            <?php
            $uri = $item->content->nav->navbar->id . '/' . $item->content->nav->id . '/' . $item->id;
            ?>
            <a href="{{url($uri)}}">
                <div class="search-block">
                    <div class="row lead" style="font-weight: bold;">
                        {{$item->name??''}}
                    </div>
                    <div class="row">
                        <blockquote>{{$item->quote??''}}</blockquote>
                        @if(!empty($item->detail))
                            <i> {{substr($item->detail ?? '', 0, 50)}} <b>...See more</b></i>
                        @endif
                    </div>
                </div>
            </a>
        @empty

        @endforelse
    </div>
</div>


@include('Frontend.Includes.footer')