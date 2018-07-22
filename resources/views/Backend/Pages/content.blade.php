@extends('Backend.backend')

@section('title')
    Content - {{$contentDetail->type}}
@endsection

@section('body')
    <div class="row m-1">
        <b class="alert alert-success form-control"> {{$contentDetail->nav->navbar->name}}
            <i class="fa fa-caret-right"></i> {{$contentDetail->nav->name}} / {{$contentDetail->type}}
            <i class="float-right fa fa-plus fa-2x text-danger"
               onclick="window.location.href='{{url('@dmin/block/add/'.$contentDetail->type.'/'.$contentDetail->id)}}'">
                Add</i>
        </b>
        @include('Backend.Includes.message')
        <table class="table table-striped">
            <tr>
                <th>s/n</th>
                <th>name</th>
                <th>quote</th>
                @if($contentDetail->type === 'detail' ||$contentDetail->type ==='list')
                    <th>detail</th>
                @endif
                <th>status</th>
                <th>block</th>
                <th>created at</th>
                <th>action</th>
            </tr>
            @forelse($contentDetail->block as $key=>$item)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->name}}</td>
                    <td><?php echo substr($item->quote, 0, 30)?></td>

                    @if($contentDetail->type === 'detail' ||$contentDetail->type ==='list')
                        <td><?php echo substr($item->detail, 0, 30)?></td>
                    @endif

                    <td>{{$item->status}}</td>
                    <td>{{$item->ImageData->title??' '}}</td>
                    <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                    <td><a href="{{url('@dmin/block/delete/'.$contentDetail->type.'/'.$item->id)}}"
                           class="fa fa-trash btn-sm btn-danger btn" onclick="return confirm('Are you sure?')"></a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No items in content! <a
                                href="{{url('@dmin/block/add/'.$contentDetail->type.'/'.$contentDetail->id)}}">Add
                            here</a></td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
