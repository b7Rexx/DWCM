@extends('Backend.backend')

@section('title')
    Nav Detail - {{$navDetail->name}}
@endsection

@section('body')
    <div class="row float-right">
        <a href="{{url('@dmin/nav/delete/'.$navDetail->id)}}" class="fa fa-trash fa-2x btn btn-danger"
           onclick="confirm('Are you sure?')"></a>
    </div>
@endsection
