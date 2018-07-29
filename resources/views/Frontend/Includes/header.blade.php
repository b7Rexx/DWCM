<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{url('images/logo/'.$main['logo'])}}">
    <title>@yield('title',$main['name'])</title>
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <style>
        .bg-body {
            background: {{$main['cssbody']??'white'}};
        }

        <?php $csshead = $main['csshead']??'grey';?>
        nav {
            background: linear-gradient({{$csshead}}, transparent, transparent, transparent, transparent, transparent);
        }

        footer {
            background: {{$csshead}};
        }

        header {
            background: {{$csshead}};
        }

    </style>
</head>
<body class="bg-body">
<div class="fa-bg">

    @for($i=1;$i<200;$i++)
        <i class="fa fa-{{$main['cssanimate']??''}}"></i>
    @endfor
</div>
<header>
    <div class="row">
        <div class="col-sm-6 header-left">
            <a href="#phone-to-{{$main['phone']}}">
                <i class="fa fa-phone"></i>
                {{$main['phone']??''}}
            </a>
            &nbsp; &nbsp; &nbsp;
            <a href="#mail-to-{{$main['email']}}">
                <i class="fa fa-envelope"></i>
                {{$main['email']??''}}
            </a>
        </div>
        <div class="col-sm-6 text-right p-1 header-right">
            <a href="//{{$main['fb']??'#fb'}}"><i class="fa fa-facebook-square ml-2"></i></a>
            <a href="//{{$main['yt']??'#yt'}}"><i class="fa fa-youtube ml-2"></i></a>
            <a href="//{{$main['insta']??'#insta'}}"><i class="fa fa-instagram ml-2"></i></a>
        </div>
    </div>
</header>