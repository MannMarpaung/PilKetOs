@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">
        <h1>Election - Edit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.election.index') }}">Election</a></li>
                <li class="breadcrumb-item active">Edit Election</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <!-- Edit Election -->
                        <form action="{{ route('admin.election.update', $election->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h5 class="card-title">Edit Election</h5>

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" required value="{{ $election->name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="starting_date" class="col-sm-2 col-form-label">Starting Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="starting_date" name="starting_date" value="{{ $election->starting_date }}"
                                        required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="finishing_date" class="col-sm-2 col-form-label">Finishing Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="finishing_date" name="finishing_date" value="{{ $election->finishing_date }}"
                                        required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="image" id="image">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.election.index') }}" class="btn btn-secondary">Cancel</a>

                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>

                        </form><!-- End Edit Election -->

                    </div>
                </div>

            </div>
        </div>
    @endsection
