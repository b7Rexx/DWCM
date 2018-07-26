<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{url('css/app.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 text-center p-5">
            <i class="fa fa-key fa-5x"> </i>
            <br>
            <br>

            <form action="{{route('login-action')}}" method="post">
                {{csrf_field()}}
                <b><i class="fa fa-2x fa-user"></i> User : </b>
                <input type="text" name="name" class="form-control" required>
                <br>
                <b><i class="fa fa-key fa-2x"></i> Password :</b>
                <input type="password" name="pass" class="form-control" required>
                <br>

                <input type="submit" class="btn btn-success form-control" value="Login">
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
</body>
</html>