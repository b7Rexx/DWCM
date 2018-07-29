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

        @if($contentDetail->type ==='list')
            <form action="{{route('admin-update-content-list')}}" method="post">
                <div class="row text-center">
                    <div class="col-md-4">
                        <b><i class="fa fa-header"></i> List Title :</b>
                    </div>
                    <div class="col-md-6">
                        {{csrf_field()}}
                        <input type="text" name="list" class="form-control" value="{{$contentDetail->name}}">
                        <input type="text" name="id" value="{{$contentDetail->id}}" style="display: none">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-success" value="Change">
                    </div>
                </div>
                <br>
            </form>
        @endif
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

                    <td>
                        <a title="change status" href="{{url('@dmin/status/block/'.$item->id)}}"
                           @if($item->status ==1)
                           class="fa fa-dot-circle-o btn btn-success"
                           @else
                           class="fa fa-dot-circle-o btn btn-danger"
                                @endif
                        ></a>
                    </td>
                    <td>
                        @if($item->ImageData)
                            <a href="<?php
                            $img = isset($item->ImageData->title) ? $item->ImageData->title : '';
                            echo url('images/upload/' . $img);
                            ?>"><i class="fa fa-image fa-2x m-1"></i></a>
                        @endif

                        @if($item->VideoData)
                            <a href="//www.youtube.com/embed/{{$item->VideoData->title}}">
                                <i class="fa fa-video-camera fa-2x m-1"></i></a>
                        @endif

                        @if($item->AudioData)
                            <a href="<?php
                            $audio = isset($item->audioData->title) ? $item->audioData->title : '';
                            echo url('audio/' . $audio);
                            ?>"><i class="fa fa-music fa-2x m-1"></i></a>
                        @endif

                        @if($item->GalleryData)
                            <a href="#"><i class="fa fa-camera fa-2x m-1"></i></a>
                        @endif
                    </td>
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
