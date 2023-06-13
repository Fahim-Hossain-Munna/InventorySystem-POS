@extends('layouts.dashboard')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Profile</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            {{-- start --}}
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-four">
                            <div class="stat-icon dib">
                                <i class="ti-user text-muted"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-heading">Users</div>
                                    <div class="stat-text">Total: 24720</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-four">
                                    <div class="stat-icon dib">
                                        <i class="ti-user text-muted"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Users</div>
                                            <div class="stat-text">Total: 24720</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-four">
                                    <div class="stat-icon dib">
                                        <i class="ti-user text-muted"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Users</div>
                                            <div class="stat-text">Total: 24720</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-four">
                                    <div class="stat-icon dib">
                                        <i class="ti-user text-muted"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Users</div>
                                            <div class="stat-text">Total: 24720</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <aside class="profile-nav alt">
                    <section class="card">
                        <div class="card-header user-header alt bg-dark">
                            <div class="media">
                                <a href="#">
                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{ asset('uploads/profile_photos') }}/{{ auth()->user()->picture }}">
                                </a>
                                <div class="media-body">
                                    <h2 class="text-light display-6">{{ auth()->user()->role }}</h2>
                                    <p>{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                        </div>


                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#"> <i class="fa fa-smile-o"></i> {{ auth()->user()->name }} <span class="badge badge-danger pull-right">15</span></a>
                            </li>
                            @if (auth()->user()->address)
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-address-card-o"></i> {{ auth()->user()->address }} <span class="badge badge-success pull-right">11</span></a>
                                </li>
                            @else
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-address-card-o"></i> NULL <span class="badge badge-success pull-right">11</span></a>
                                </li>
                            @endif
                            <li class="list-group-item">
                                <a href="#"> <i class="fa fa-phone"></i> {{ auth()->user()->tel }} <span class="badge badge-primary pull-right">10</span></a>
                            </li>
                            <li class="list-group-item">
                                <a href="#"> <i class="fa fa-comments-o"></i> Message <span class="badge badge-warning pull-right r-activity">03</span></a>
                            </li>
                        </ul>

                    </section>
                </aside>
            </div>

            {{-- end --}}
        </div>
    </div>
</div>

@endsection
