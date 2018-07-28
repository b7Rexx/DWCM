<nav class="navbar navbar-expand-lg navbar-light" id="stickyheader">
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
                            <i class="fa fa-cloud"></i>
                            <h>{{$navbar1->name}}</h>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @forelse($navbar1->nav as $nav_navbar)
                                <a class="dropdown-item" href="{{url($navbar1->id.'/'.$nav_navbar->id)}}">
                                    <i class="fa fa-bolt"></i> {{$nav_navbar->name}}
                                </a>
                            @empty
                                <div class="dropdown-divider"></div>
                            @endforelse

                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{url($navbar1->id.'/'.$navbar1->nav[0]->id)}}">
                            <i class="fa fa-cloud"></i>
                            <h>{{$navbar1->nav[0]->name}}</h>
                        </a>
                    </li>
                @endif
            @empty
            <i class="fa fa-bolt"></i> @endforelse
        </ul>
        {{--<form class="form-inline my-2 my-lg-0">--}}
            {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
            {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
        {{--</form>--}}
        <form class="form-inline my-2 my-lg-0 search" method="post" action="{{route('search')}}">
            {{csrf_field()}}
            <input class="form-control" id="search" type="search" placeholder="Type keywords and hit enter"
                   name="k" autocomplete="off">
            &nbsp;<i class="fa fa-search pr-3" id="searchToggle" contenteditable="false"> Search</i>
        </form>
    </div>
</nav>