@extends('Backend.backend')

@section('title')
    Navbar List
@endsection

@section('body')
    <div class="row justify-content-center">
        <a href="{{route('admin-add-navbar')}}" class="btn btn-warning pl-5 pr-5"><i class="fa fa-plus"></i> Add Navbar</a>
    </div>
    <br>
    <div class="row">
        <table class="table table-striped">
            <tr>
                <th>s/n</th>
                <th>Name</th>
                <th>Dropdown</th>
                <th>status</th>
                <th>created at</th>
            </tr>
            @forelse($navbar as $key=>$item)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->dropdown}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No navbar item! <a href="{{route('admin-add-navbar')}}">Add navbar here!</a></td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
