@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">
        <h1>Election Candidate - Show</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.election_candidate.index') }}">Election Candidate</a>
                </li>
                <li class="breadcrumb-item active">Show Election Candidate</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ url('storage/candidate', $election_candidate->candidates->ketua_image) }}"
                            alt="Profile" class="rounded-circle">
                        <h2>{{ $election_candidate->candidates->ketua->name }}</h2>
                        <h3>Ketua of Election Candidate</h3>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ url('storage/candidate', $election_candidate->candidates->wakil_image) }}"
                            alt="Profile" class="rounded-circle">
                        <h2>{{ $election_candidate->candidates->wakil->name }}</h2>
                        <h3>Wakil of Election Candidate</h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body">
                        <!-- Bordered Tabs -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Election</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $election_candidate->elections->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Status</div>
                                    <div class="col-lg-9 col-md-8">
                                        @if ($election_candidate->elections->status === 'completed')
                                            <span class="badge rounded-pill bg-success">Completed</span>
                                        @elseif ($election_candidate->elections->status === 'ongoing')
                                            <span class="badge rounded-pill bg-danger">Ongoing</span>
                                        @elseif ($election_candidate->elections->status === 'upcoming')
                                            <span class="badge rounded-pill bg-info">Upcoming</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Starting Date</div>
                                    <div class="col-lg-9 col-md-8">{{ $election_candidate->elections->starting_date }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Finishing Date</div>
                                    <div class="col-lg-9 col-md-8">{{ $election_candidate->elections->finishing_date }}
                                    </div>
                                </div>

                                <h5 class="card-title">Ketua of Election Candidate</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $election_candidate->candidates->ketua->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Class</div>
                                    <div class="col-lg-9 col-md-8">{{ $election_candidate->candidates->ketua->class }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">NIS</div>
                                    <div class="col-lg-9 col-md-8">{{ $election_candidate->candidates->ketua->nis }}</div>
                                </div>

                                <h5 class="card-title">Wakil of Election Candidate</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $election_candidate->candidates->wakil->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Class</div>
                                    <div class="col-lg-9 col-md-8">{{ $election_candidate->candidates->wakil->class }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">NIS</div>
                                    <div class="col-lg-9 col-md-8">{{ $election_candidate->candidates->wakil->nis }}</div>
                                </div>

                                <h5 class="card-title">Vision of Election Candidate</h5>
                                <p class="small fst-italic">{{ $election_candidate->candidates->vision }}</p>

                                <h5 class="card-title">Mission of Election Candidate</h5>
                                <p class="small fst-italic">{{ $election_candidate->candidates->mission }}</p>

                            </div>
                        </div>
                        <!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
