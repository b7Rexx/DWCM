@extends('Backend.backend')

@section('title')
    Nav Detail - {{$navDetail->name}}
@endsection

@section('body')
    <div class="row float-right">
        <a href="{{url('@dmin/nav/delete/'.$navDetail->id)}}" class="fa fa-trash fa-2x btn btn-danger"
           onclick="return confirm('Are you sure?')"></a>
    </div>
    <b class="alert alert-success form-control col-sm-6 ml-3">{{$navDetail->name}}</b>
    <h4 class="m-2 text-success font-weight-bold"> Add Contents</h4>
    <br>
    <?php
    $bg = [];
    foreach ($navDetail->content as $key => $cont) {
        $bg[$cont->type] = $cont->status === 1 ? 'bg-success' : 'bg-danger';
    }

    ?>
    <div class="row">
        <div class="pr-5 pl-5 col-md-5 col-sm-6 mb-3">
            <div class="card text-white bg-primary {{$bg['carousel']??''}} o-hidden h-100">
                <div class="card-body"
                     onclick="window.location.href='{{url('@dmin/content/carousel/'.$navDetail->id)}}'">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-image"></i>
                    </div>
                    <div class="mr-5"><i class="fa fa-plus fa-2x"></i> <b>Carousel</b></div>
                </div>
                <a class="card-footer text-white clearfix small z-1"
                   href="{{url('@dmin/status/content/carousel/'.$navDetail->id)}}">
                    <span class="float-left">Click here! to change Status</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>


        <div class="pr-5 pl-5 col-md-5 col-sm-6 mb-3">
            <div class="card text-white bg-primary {{$bg['ads']??''}} o-hidden h-100">
                <div class="card-body"
                     onclick="window.location.href='{{url('@dmin/content/ads/'.$navDetail->id)}}'">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-angellist"></i>
                    </div>
                    <div class="mr-5"><i class="fa fa-plus fa-2x"></i> <b>Ads</b></div>
                </div>
                <a class="card-footer text-white clearfix small z-1"
                   href="{{url('@dmin/status/content/ads/'.$navDetail->id)}}">

                <span class="float-left">Click here! to change Status</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>

        <div class="pr-5 pl-5 col-md-5 col-sm-6 mb-3">
            <div class="card text-white bg-primary {{$bg['detail']??''}} o-hidden h-100">
                <div class="card-body"
                     onclick="window.location.href='{{url('@dmin/content/detail/'.$navDetail->id)}}'">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-sticky-note"></i>
                    </div>
                    <div class="mr-5"><i class="fa fa-plus fa-2x"></i> <b>Detail Block</b></div>
                </div>
                <a class="card-footer text-white clearfix small z-1"
                   href="{{url('@dmin/status/content/detail/'.$navDetail->id)}}">
                    <span class="float-left">Click here! to change Status</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>

        <div class="pr-5 pl-5 col-md-5 col-sm-6 mb-3">
            <div class="card text-white bg-primary {{$bg['list']??''}} o-hidden h-100">
                <div class="card-body"
                     onclick="window.location.href='{{url('@dmin/content/list/'.$navDetail->id)}}'">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5"><i class="fa fa-plus fa-2x"></i> <b>List Block</b></div>
                </div>
                <a class="card-footer text-white clearfix small z-1"
                   href="{{url('@dmin/status/content/list/'.$navDetail->id)}}">

                <span class="float-left">Click here! to change Status</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>

    </div>

@endsection
