@extends('Backend.backend')

@section('title')
    CSS ADMIN
@endsection

@section('body')
    <div class="row">
        <form action="{{route('admin-css-change')}}" method="post" class="form-control p-5" style="border: none">
        <h4>
            <i class="alert alert-success fa fa-print form-control"> Choose appropriate colors</i>
        </h4>
            {{csrf_field()}}
            <b><i class="fa fa-paint-brush"></i> Head background color : </b>
            <input type="color" class="form-control" name="head" style="width: 120px; height: 50px;" value="{{$main['csshead']??''}}">
            <br>
            <b><i class="fa fa-paint-brush"></i> Body background color : </b>
            <input type="color" class="form-control" name="body" style="width: 120px; height: 50px;" value="{{$main['cssbody']??''}}">
            <br>
            <b><i class="fa fa-paint-brush"></i> Background animation type : </b>
            <input type="text" class="form-control" name="animate" value="{{$main['cssanimate']??''}}">

            <br>
            <input type="submit" class="form-control btn btn-success btn-lg" value="Change colors">
        </form>
    </div>
@endsection
