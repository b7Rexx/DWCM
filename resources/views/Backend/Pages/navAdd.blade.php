@extends('Backend.backend')

@section('title')
    Add Nav to - {{$navbarDetail->name}}
@endsection

@section('body')
    <div class="row">
        <div class="col-sm-8">
            <b class="alert alert-success form-control">Add Nav to {{$navbarDetail->name}}</b>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-8">
            @include('backend.Includes.message')

            <br>
            <form action="{{route('admin-add-nav-action')}}" method="post">
                {{csrf_field()}}

                <b><i class="fa fa-file"></i> Name : </b>
                <input type="text" class="form-control" name="name" required>
                <br>
                <input type="text" value="{{$navbarDetail->id}}" name="navbar_id" style="display: none">
                <input type="submit" value="Publish" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection
