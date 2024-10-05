@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">
        <h1>Election</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ Auth::user()->role == 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Election</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body" style="overflow: auto">
                        <h5 class="card-title">Election Table</h5>
                        @if (Auth::user()->role == 'admin')
                            <div class="d-flex justify-content-end mb-2">
                                <form action="{{ route('admin.election.create') }}">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-plus me-1"></i> Create Election
                                    </button>
                                </form>
                            </div>
                        @endif
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Election Name</th>
                                    <th>Election Image</th>
                                    <th>Starting Date</th>
                                    <th>Finishing Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($election as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <img src="{{ url('storage/election', $item->image) }}" alt="image"
                                                    width="120" height="120" style="object-fit: cover;">
                                            </div>
                                        </td>
                                        <td>{{ $item->starting_date }}</td>
                                        <td>{{ $item->finishing_date }}</td>
                                        <td>
                                            @if ($item->status === 'completed')
                                                <span class="badge rounded-pill bg-success">Completed</span>
                                            @elseif ($item->status === 'ongoing')
                                                <span class="badge rounded-pill bg-danger">Ongoing</span>
                                            @elseif ($item->status === 'upcoming')
                                                <span class="badge rounded-pill bg-info">Upcoming</span>
                                            @endif
                                        </td>
                                        <td>

                                            {{-- Show Election --}}
                                            <form action="{{ Auth::user()->role == 'admin' ? route('admin.election.show', $item->id) : route('user.election.show', $item->id) }}" class="m-1">
                                                <button type="submit" class="btn btn-info">
                                                    <i class="bi bi-eye me-1"></i>
                                                </button>
                                            </form>

                                            @if (Auth::user()->role == 'admin')
                                                {{-- Add Candidate --}}
                                                <form action="{{ route('admin.election.candidate.index', $item->id) }}"
                                                    class="m-1">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="bi bi-plus me-1"></i>
                                                    </button>
                                                </form>

                                                {{-- Edit Election --}}
                                                <form action="{{ route('admin.election.edit', $item->id) }}"
                                                    class="m-1">
                                                    <button type="submit" class="btn btn-warning">
                                                        <i class="bi bi-pencil me-1"></i>
                                                    </button>
                                                </form>

                                                {{-- Delete Election --}}
                                                <form action="{{ route('admin.election.destroy', $item->id) }}"
                                                    method="post" class="m-1">
                                                    @csrf
                                                    @method('DELETE')

                                                    <!-- Delete Modal -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteElection{{ $item->id }}">
                                                        <i class="bi bi-trash me-1"></i>
                                                    </button>
                                                    <div class="modal fade" id="deleteElection{{ $item->id }}"
                                                        tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Delete Election</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete this Election?
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
                                            @endif


                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center fst-italic" colspan="6">NO DATA</td>
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
