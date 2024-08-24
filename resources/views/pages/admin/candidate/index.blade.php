@extends('layouts.admin.parent')

@section('title', 'Admin Dashboard - Candidate')

@section('content')



    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <h1>ADMIN DASHBOARD - CANDIDATE</h1>

    <a href="{{ route('admin.candidate.create') }}">
        Create Candidate
    </a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Ketua Name</th>
                <th>Ketua Image</th>
                <th>Wakil Name</th>
                <th>Wakil Image</th>
                <th>Vision</th>
                <th>Mission</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($candidate as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->ketua->name }}</td>
                    <td>
                        <img src="{{ url('storage/candidate', $item->ketua_image) }}" alt="ketua_image" width="160">
                    </td>
                    <td>{{ $item->wakil->name }}</td>
                    <td>
                        <img src="{{ url('storage/candidate', $item->wakil_image) }}" alt="wakil_image" width="160">
                    </td>
                    <td>{{ $item->vision }}</td>
                    <td>{{ $item->mission }}</td>
                </tr>
            @empty
                <tr>
                    <th colspan="7">NO DATA</th>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
{{-- 2 --}}