@extends('Backend.backend')

@section('title')
    TITLE HERE
@endsection

@section('body')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5">26 New Messages!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
    </div>

    <div>
        <?php
        foreach ($navbar as $asd) {
//            var_dump($asd->nav);
            echo "<pre>";
            print_r($asd->nav);
            if (!empty($asd->nav->name)) {
                echo $asd->nav->name.'ok';
            }
            echo "</pre>";
        }
        echo "<pre>";

        echo "</pre>";
        ?>
    </div>
@endsection
