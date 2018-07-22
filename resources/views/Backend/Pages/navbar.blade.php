@extends('Backend.backend')

@section('title')
    Navbar List
@endsection

@section('body')
    <div class="row justify-content-center">
        <a href="{{route('admin-add-navbar')}}" class="btn btn-warning pl-5 pr-5"><i class="fa fa-plus"></i> Add Navbar</a>
    </div>
    <br>

    @include('backend.Includes.message')

    <div class="row">
        <table class="table table-striped">
            <tr>
                <th>s/n</th>
                <th>Name</th>
                <th>Dropdown</th>
                <th>status</th>
                <th>Placement</th>
                <th>created at</th>
                <th>action</th>
            </tr>
            @forelse($navbar as $key=>$item)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        @if($item->dropdown == 0)
                            <i class="fa fa-times text-danger"></i>
                        @else
                            <i class="fa fa-check text-success"></i>
                        @endif
                    </td>
                    <td>
                        <a title="change status" href="{{url('@dmin/status/navbar/'.$item->id)}}"
                           @if($item->status ==1)
                           class="fa fa-dot-circle-o btn btn-success"
                           @else
                           class="fa fa-dot-circle-o btn btn-danger"
                                @endif
                        ></a>
                    </td>
                    <td>{{$item->placement}}</td>
                    <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                    <td>
                        <a href="{{url('@dmin/navbar/delete/'.$item->id)}}" onclick="return confirm('Are you sure?')">
                            <i class="fa fa-trash btn btn-danger btn-xs"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No navbar item! <a href="{{route('admin-add-navbar')}}">Add navbar here!</a></td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
