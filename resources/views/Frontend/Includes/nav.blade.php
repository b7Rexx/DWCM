<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}">
        <img src="{{url('images/logo/'.$main['logo'])}}" alt="logo" style="height: 50px;width:50px">
        {{$main['name']??''}}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @forelse($navbar as $navbar1)
                @if($navbar1->dropdown)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            {{$navbar1->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @forelse($navbar1->nav as $nav_navbar)
                                <a class="dropdown-item" href="{{url($navbar1->id.'/'.$nav_navbar->id)}}">
                                    {{$nav_navbar->name}}
                                </a>
                            @empty
                                <div class="dropdown-divider"></div>
                            @endforelse

                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{url($navbar1->id.'/'.$navbar1->nav[0]->id)}}">
                            {{$navbar1->nav[0]->name}}
                        </a>
                    </li>
                @endif
            @empty
            @endforelse
        </ul>
        {{--<form class="form-inline my-2 my-lg-0">--}}
            {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
            {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
        {{--</form>--}}
    </div>
</nav>