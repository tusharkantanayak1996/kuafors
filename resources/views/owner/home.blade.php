@extends('owner.layout.app')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Dashboard

        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span><img src="assets/images/icon-10.png" alt=""
                        style="width: 18px;">
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Dashboard
                </li>
            </ul>
        </nav>
    </div>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center p-5">Welcome to Kuafor!</h4>
                    <div class="video">
                        <iframe src="https://www.youtube.com/embed/D0UnqGm_miA"
                            title="Dummy Video For Website" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen style="width: 100%; height: 100%;"></iframe>
                    </div>
                    <div class="col-md-3 offset-md-9 mt-5">
                        <div class="float-right"><a href="#" class="btn btn-primary ">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
