@extends('Backend.backend')

@section('title')
    Block
@endsection

@section('body')
    <div class="row m-1">
        <b class="alert alert-success form-control"> {{$contentDetail->nav->navbar->name}}
            <i class="fa fa-caret-right"></i> {{$contentDetail->nav->name}} / {{$contentDetail->type}}
        </b>

        <div class="col-sm-8">
            @include('Backend.Includes.message')
            <form action="{{route('admin-add-block')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                {{--form selector--}}
                @include('Backend.Block.Add.'.$type)
                <br>
                <b><i class="fa fa-angellist"></i> Put animation to block : </b>
                <select name="animation" class="form-control">
                    <option value="none"> --- &nbsp;&nbsp;None &nbsp;&nbsp;----</option>
                    @forelse($animation as $animate)
                        <option value="{{$animate}}"> ---&nbsp;&nbsp;&nbsp; {{$animate}} &nbsp;&nbsp;&nbsp;---</option>
                    @empty
                    @endforelse
                </select>

                <input type="text" name="content_id" value="{{$contentDetail->id}}" style="display: none;">
                <input type="text" name="type" value="{{$type}}" style="display: none;">
                <br>
                <br>
                <input type="submit" value="Add Block" class="btn btn-success float-right">
            </form>
            <button class="btn btn-secondary" onclick="window.history.back()"><i class="fa fa-caret-left"></i> Back
            </button>
        </div>
    </div>
@endsection
