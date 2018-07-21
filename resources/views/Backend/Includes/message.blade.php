@if(session('success'))
    <div>
        <i class="alert alert-success">
            {{session('success')}}
        </i>
    </div>
    <br>
@elseif(session('fail'))
    <div>
        <i class="alert alert-danger">
            {{session('fail')}}
        </i>
    </div>
    <br>
@endif