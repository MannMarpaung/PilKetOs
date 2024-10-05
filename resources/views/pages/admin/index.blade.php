@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Auth Card -->
            <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Role : {{ Auth::user()->role }} <span>| Email :
                                {{ Auth::user()->email }}</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-person"></i>
                            </div>
                            <div class="ps-3">
                                <h6>Name : {{ Auth::user()->name }}</h6>
                                <span class="text-danger small pt-1 fw-bold">NIS : {{ Auth::user()->nis }}</span> <span
                                    class="text-muted small pt-2 ps-1">Class : {{ Auth::user()->class }}</span>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- End Auth Card -->

            @if (Auth::user()->role == 'admin')
                <!-- Users Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Users</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-check"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $userCount }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Users Card -->
            @endif


        </div>
    </section>
@endsection
