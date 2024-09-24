@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">
        <h1>Election</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.election.index') }}">Election</a></li>
                <li class="breadcrumb-item active">Show Election</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->


    <section class="section profile">
        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-pane fade show active profile-overview">
                            <h5 class="card-title">{{ $election->name }}</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Status</div>
                                <div class="col-lg-9 col-md-8">
                                    @if ($election->status === 'completed')
                                        <span class="badge rounded-pill bg-success">Completed</span>
                                    @elseif ($election->status === 'ongoing')
                                        <span class="badge rounded-pill bg-danger">Ongoing</span>
                                    @elseif ($election->status === 'upcoming')
                                        <span class="badge rounded-pill bg-info">Upcoming</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Starting Date</div>
                                <div class="col-lg-9 col-md-8">
                                    {{ $election->starting_date }}
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Finishing Date</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ $election->finishing_date }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Result</div>
                                    <div class="col-lg-9 col-md-8">
                                        @if ($election->status != 'completed')
                                            Election has not completed yet
                                        @else
                                            <a href="{{ route('admin.result', $election->id) }}">Result</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @forelse ($candidate as $can)
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <h5 class="card-title">
                                Candidate Number {{ $can->number }}
                            </h5>
                            <div class="row col-xl-12 d-flex justify-content-center">
                                <div class="col-xl-5 pt-4 d-flex flex-column align-items-center">

                                    <div class="d-flex justify-content-center">
                                        <img src="{{ url('storage/candidate', $can->ketua_image) }}" alt="ketua_image" width="120" height="120" class="rounded-circle" style="object-fit: cover;">
                                    </div>
                                    <h2>{{ $can->ketua->name }}</h2>
                                    <h3>Ketua of Candidate</h3>
                                </div>
                                <div class="col-xl-5 pt-4 d-flex flex-column align-items-center">

                                    <div class="d-flex justify-content-center">
                                        <img src="{{ url('storage/candidate', $can->wakil_image) }}" alt="wakil_image" width="120" height="120" class="rounded-circle" style="object-fit: cover;">
                                    </div>
                                    <h2>{{ $can->wakil->name }}</h2>
                                    <h3>Wakil of Candidate</h3>
                                </div>
                            </div>
                            <form action="{{ route('admin.election.candidate.show', [$election->id, $can->id]) }}">
                                <button type="submit" class="btn btn-info text-white">Show More</button>
                            </form>

                        </div>
                    </div>
                @empty
                </div>
    </section>
    <div class="col-xl-12">
        <div class="card">
            <h5 class="card-title text-center">
                No Data
            </h5>
                <form action="{{ route('admin.election.candidate.index', $election->id) }}" class="d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-primary text-white">Add Candidate</button>
                </form>
        </div>
    </div>
    @endforelse
@endsection
