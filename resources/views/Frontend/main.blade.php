@section('title')
    @if(empty($main['short_name']))
        {{$main['name']}}
    @else
        {{$main['short_name']??$main['name']}}
    @endif
    -
    {{$navbar_select->name??''}}
    @if($navbar_select->dropdown??0)
        >
        {{$nav_select->name??''}}
    @else
    @endif
@endsection


@include('Frontend.Includes.header')


{{-- BODY CONTAINER--}}
<div class="container bg-main">
    @include('Frontend.Includes.nav')

    <div class="row">
        @if($carousel??0)
            @include('Frontend.content.carousel')
        @endif
    </div>
    <br>
    <div class="row">
        <div class="col-md-8">
            @if($detail??0)
                @include('Frontend.content.detail')
            @endif
        </div>
        <div class="col-md-4">
            @if($related??0)
                @include('Frontend.content.related')
            @endif
        </div>
    </div>
    @if($list??0)
        @include('Frontend.content.list')
    @endif
</div>


@include('Frontend.Includes.footer')