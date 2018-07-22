@extends('Backend.backend')

@section('title')
    Content - {{$contentDetail->type}}
@endsection

@section('body')
    <div class="row m-1">
        <b class="alert alert-success form-control"> {{$contentDetail->nav->navbar->name}}
            <i class="fa fa-caret-right"></i> {{$contentDetail->nav->name}} / {{$contentDetail->type}}
            <i class="float-right fa fa-plus fa-2x text-danger"
               onclick="window.location.href='{{url('@dmin/block/add/'.$contentDetail->type.'/'.$contentDetail->id)}}'"> Add</i>
        </b>

        <table class="table table-striped">
            <tr>
                <th>s/n</th>
                <th>name</th>
                <th>quote</th>
                <th>detail</th>
                <th>status</th>
                <th>block</th>
                <th>created at</th>
                <th>action</th>
            </tr>
            @forelse($contentDetail->block as $item)
                {{var_dump($item)}}
            @empty
                <tr>
                    <td colspan="8">No items in content! <a href="{{url('@dmin/block/add/'.$contentDetail->type.'/'.$contentDetail->id)}}">Add here</a></td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
