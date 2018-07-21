@extends('Backend.backend')

@section('title')
    Navbar List
@endsection

@section('body')
    <div class="row">
        <div class="col-sm-8">
            <a href="{{route('admin-navbar')}}" class="alert alert-success form-control">Navbar</a>
            <hr>
            @include('Backend.Includes.message')
            <form action="{{route('admin-add-navbar-action')}}" method="post">
                {{csrf_field()}}
                <b>Navbar Title : </b>
                <input type="text" class="form-control" name="name" placeholder="Navbar Name" required>
                <br><b>Require dropdown : </b>
                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check"></i> Yes
                <input type="radio" name="dropdown" value="1">
                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-times"></i> No
                <input type="radio" name="dropdown" value="0" checked>
                <br>
                <br>
                <input type="submit" class="btn btn-success" value="Publish">
            </form>
        </div>
    </div>
@endsection
