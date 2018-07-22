@if(session('success'))
    <div>
        <i class="alert form-control alert-success">
            {{session('success')}}
        </i>
    </div>
    <br>
@elseif(session('fail'))
    <div>
        <i class="alert form-control alert-danger">
            {{session('fail')}}
        </i>
    </div>
    <br>
@endif