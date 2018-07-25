@extends('Backend.backend')

@section('title')
    Main
@endsection

@section('body')
    <div class="row">
        <b class="alert alert-success m-2 form-control">Website Info Here :</b>
    </div>
    <br>
    @include('Backend.Includes.message')

    <form action="{{route('admin-main-update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-4">
                <b><i class="fa fa-dot-circle-o"></i> Name :</b>
                <input type="text" name="name" class="form-control" value="{{$main['name']??''}}" required>
            </div>
            <div class="col-sm-4">
                <b><i class="fa fa-dot-circle-o"></i> Short-name :</b>
                <input type="text" name="short_name" class="form-control" value="{{$main['short_name']??''}}">
            </div>
            <div class="col-sm-4">
                <b><i class="fa fa-dot-circle-o"></i> Quote :</b>
                <input type="text" name="quote" class="form-control" value="{{$main['quote']??''}}">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <b><i class="fa fa-dot-circle-o"></i> Upload Logo :</b>
                <input type="file" name="logo" class="form-control">
            </div>
            <div class="col-sm-4">
                <b><i class="fa fa-dot-circle-o"></i> Email :</b>
                <input type="text" name="email" class="form-control" value="{{$main['email']??''}}">
            </div>
            <div class="col-sm-4">
                <b><i class="fa fa-dot-circle-o"></i> Phone :</b>
                <input type="text" name="phone" class="form-control" value="{{$main['phone']??''}}">
            </div>
        </div>
        <br>
        <b class="fa fa-link m-2 "> Links</b>
        <div class="row">
            <div class="col-sm-4">
                <b><i class="fa fa-dot-circle-o"></i> facebook:</b>
                <input type="text" name="fb" class="form-control" value="{{$main['fb']??''}}">
            </div>
            <div class="col-sm-4">
                <b><i class="fa fa-dot-circle-o"></i> instagram :</b>
                <input type="text" name="insta" class="form-control" value="{{$main['insta']??''}}">
            </div>
            <div class="col-sm-4">
                <b><i class="fa fa-dot-circle-o"></i> youtube :</b>
                <input type="text" name="yt" class="form-control" value="{{$main['yt']??''}}">
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <button class="btn btn-success form-control"> Update</button>
            </div>
        </div>
    </form>
@endsection
