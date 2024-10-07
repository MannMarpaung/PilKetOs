@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">
        <h1>Candidate - Edit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.election.index') }}">Election</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.election.candidate.index', $election->id) }}">Candidate</a></li>
                <li class="breadcrumb-item active">Edit Candidate</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <!-- Create Candidate -->
                        <form action="{{ route('admin.election.candidate.update', [$election->id, $candidate->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h5 class="card-title">Ketua of Candidate</h5>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="ketua_id">Ketua ID</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Ketua ID" name="ketua_id" id="ketua_id" required>
                                        <option selected value="{{ $candidate->ketua_id }}">{{ $candidate->ketua->name }}</option>
                                        @forelse ($user as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @empty
                                            <option disabled>No Data</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ketua_image" class="col-sm-2 col-form-label">Ketua Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="ketua_image" id="ketua_image">
                                </div>
                            </div>

                            <h5 class="card-title">Wakil of Candidate</h5>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="wakil_id">Wakil ID</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Wakil ID" name="wakil_id" id="wakil_id" required>
                                        <option selected value="{{ $candidate->wakil_id }}">{{ $candidate->wakil->name }}</option>
                                        @forelse ($user as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @empty
                                            <option disabled>No Data</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="wakil_image" class="col-sm-2 col-form-label">Wakil Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="wakil_image" id="wakil_image">
                                </div>
                            </div>

                            <h5 class="card-title">Vision of Candidate</h5>

                            <div class="row mb-3">
                                <label for="vision" class="col-sm-2 col-form-label">Vision</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="vision" name="vision" maxlength="65530" style="height: 100px" required>{{ $candidate->vision }}</textarea>
                                </div>
                            </div>

                            <h5 class="card-title">Mission of Candidate</h5>

                            <div class="row mb-3">
                                <label for="mission" class="col-sm-2 col-form-label">Mission</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="mission" name="mission" maxlength="65530" style="height: 100px" required>{{ $candidate->mission }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.election.candidate.index', $election->id) }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>

                        </form><!-- End Create Candidate -->

                    </div>
                </div>

            </div>
        </div>
    @endsection
