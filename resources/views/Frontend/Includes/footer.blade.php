<footer>
    <div class="row">
        <div class="col-sm-4 p-4">
            <img src="{{url('images/logo/'.$main['logo']??'')}}" alt="logo">
            <h3>{{$main['name']??''}}</h3>
            <blockquote>{{$main['quote']??''}}</blockquote>
        </div>
        <div class="col-sm-4 p-4">
            <h3> <i class="fa fa-link"></i> Quick Links</h3>
            <hr>
            @forelse($navbar as $navbar2)
                @if(!$navbar2->dropdown)
                    <a href="{{url($navbar2->id.'/'.$navbar2->nav[0]->id)}}"><i class="fa fa-cloud"></i> <i
                                class="fa fa-caret-right"></i> {{$navbar2->name}}</a>
                    <br>
                @endif
            @empty
            @endforelse
        </div>
        <div class="col-sm-4 p-4">
            <h3> <i class="fa fa-link"></i> Dropdown Links</h3>
            <hr>
            @forelse($navbar as $navbar3)
                @if($navbar3->dropdown)
                    <i class="fa fa-cloud"></i> {{$navbar3->name}}
                    <br>
                    @forelse($navbar3->nav as $nav_navbar2)
                        <a href="{{url($navbar3->id.'/'.$nav_navbar2->id)}}">
                            <i class="fa fa-bolt pl-4"></i> <i class="fa fa-caret-right"></i> {{$nav_navbar2->name}}
                        </a>
                        <br>
                    @empty
                    @endforelse
                @endif
            @empty
            @endforelse
        </div>
    </div>
</footer>


<script src="{{url('js/app.js')}}"></script>
<script>
    // Navbar Fixed Top on Scroll
    $(function () {
        // Check the initial Poistion of the Sticky Header
        var stickyHeaderTop = $('#stickyheader').offset().top;
        var checkWidth = $(window).width();
        console.log(checkWidth);
        $(window).scroll(function () {
            if ($(window).scrollTop() > stickyHeaderTop && checkWidth > 977) {
                $('#stickyheader').css({position: 'fixed', top: '0px', background: '{{$main['csshead']??'grey'}}'});
            } else {
                $('#stickyheader').css({
                    position: 'static',
                    top: '0',
                    background: 'linear-gradient({{$main['csshead']??'grey'}}, transparent, transparent, transparent, transparent, transparent)'
                });
            }
        });
    });
</script>
</body>
</html>
