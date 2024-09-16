@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">
        <h1>Candidate - Show</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.election.index') }}">Election</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.election.candidate.index', $election->id) }}">Candidate</a></li>
                <li class="breadcrumb-item active">Show Candidate</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <div class="d-flex justify-content-center">
                            <img src="{{ url('storage/candidate', $candidate->ketua_image) }}" alt="wakil_image" class="rounded-circle" width="120" height="120" style="object-fit: cover;">
                        </div>
                        <h2>{{ $candidate->ketua->name }}</h2>
                        <h3>Ketua of Candidate</h3>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <div class="d-flex justify-content-center">
                            <img src="{{ url('storage/candidate', $candidate->wakil_image) }}" alt="wakil_image" class="rounded-circle" width="120" height="120" style="object-fit: cover;">
                        </div>
                        <h2>{{ $candidate->wakil->name }}</h2>
                        <h3>Wakil of Candidate</h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body">
                        <!-- Bordered Tabs -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Number of Candidate</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Number</div>
                                    <div class="col-lg-9 col-md-8">{{ $candidate->number }}</div>
                                </div>

                                <h5 class="card-title">Ketua of Candidate</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $candidate->ketua->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Class</div>
                                    <div class="col-lg-9 col-md-8">{{ $candidate->ketua->class }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">NIS</div>
                                    <div class="col-lg-9 col-md-8">{{ $candidate->ketua->nis }}</div>
                                </div>

                                <h5 class="card-title">Wakil of Candidate</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $candidate->wakil->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Class</div>
                                    <div class="col-lg-9 col-md-8">{{ $candidate->wakil->class }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">NIS</div>
                                    <div class="col-lg-9 col-md-8">{{ $candidate->wakil->nis }}</div>
                                </div>

                                <h5 class="card-title">Vision of Candidate</h5>
                                <p class="small fst-italic">{{ $candidate->vision }}</p>

                                <h5 class="card-title">Mission of Candidate</h5>
                                <p class="small fst-italic">{{ $candidate->mission }}</p>

                            </div>
                        </div>
                        <!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
