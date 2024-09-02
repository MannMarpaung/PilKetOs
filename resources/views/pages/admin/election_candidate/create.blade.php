@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">
        <h1>Election Candidate - Create</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.election_candidate.index') }}">Election Candidate</a>
                </li>
                <li class="breadcrumb-item active">Create Election Candidate</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <!-- Create Election Candidate -->
                        <form action="{{ route('admin.election_candidate.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <h5 class="card-title">Create Election Candidate</h5>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="election_id">Election ID</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Election ID" name="election_id" id="election_id"
                                        required>
                                        <option disabled selected value="">Select Election</option>
                                        @forelse ($election as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @empty
                                            <option disabled>No Data</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="candidate_id">Candidate ID</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Candidate ID" name="candidate_id" id="candidate_id"
                                        required>
                                        <option disabled selected value="">Select Candidate</option>
                                        @forelse ($candidate as $item)
                                            <option value="{{ $item->id }}">{{ $item->ketua->name }} & {{ $item->wakil->name }}</option>
                                        @empty
                                            <option disabled>No Data</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.election_candidate.index') }}"
                                        class="btn btn-secondary">Cancel</a>

                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>

                        </form><!-- End Create Election Candidate -->

                    </div>
                </div>

            </div>
        </div>
    @endsection
