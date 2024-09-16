@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">
        <h1>Candidate</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.election.index') }}">Election</a></li>
                <li class="breadcrumb-item active">Candidate</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body" style="overflow: auto">
                        <h5 class="card-title">Candidate of {{ $election->name }}</h5>
                        <div class="d-flex justify-content-end mb-2">
                            <form action="{{ route('admin.election.candidate.create', $election->id) }}">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-plus me-1"></i> Create Candidate
                                </button>
                            </form>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Ketua Name</th>
                                    <th>Ketua Image</th>
                                    <th>Wakil Name</th>
                                    <th>Wakil Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($candidate as $item)
                                    <tr>
                                        <td>{{ $item->number }}</td>
                                        <td>{{ $item->ketua->name }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <img src="{{ url('storage/candidate', $item->ketua_image) }}" alt="ketua_image" class="rounded-circle" width="160" height="160" style="object-fit: cover;">
                                            </div>
                                        </td>
                                        <td>{{ $item->wakil->name }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <img src="{{ url('storage/candidate', $item->wakil_image) }}" alt="wakil_image" class="rounded-circle" width="160" height="160" style="object-fit: cover;">
                                            </div>
                                        </td>
                                        <td>
                                            <form
                                                action="{{ route('admin.election.candidate.show', [$election->id, $item->id]) }}"
                                                class="m-1">
                                                <button type="submit" class="btn btn-info">
                                                    <i class="bi bi-eye me-1"></i>
                                                </button>
                                            </form>

                                            <form
                                                action="{{ route('admin.election.candidate.edit', [$election->id, $item->id]) }}"
                                                class="m-1">
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="bi bi-pencil me-1"></i>
                                                </button>
                                            </form>

                                            <form
                                                action="{{ route('admin.election.candidate.destroy', [$election->id, $item->id]) }}"
                                                method="post" class="me-1">
                                                @csrf
                                                @method('DELETE')

                                                <!-- Delete Modal -->
                                                <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                                                    data-bs-target="#deleteCandidate{{ $item->id }}">
                                                    <i class="bi bi-trash me-1"></i>
                                                </button>
                                                <div class="modal fade" id="deleteCandidate{{ $item->id }}" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete Candidate</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this Candidate?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End Delete Modal-->
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center fst-italic" colspan="8">NO DATA</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
