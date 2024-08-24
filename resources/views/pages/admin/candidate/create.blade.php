@extends('layouts.admin.parent')

@section('title', 'Admin Dashboard - Candidate - Create')

@section('content')

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <h1>ADMIN DASHBOARD - CANDIDATE - CREATE</h1>

    <br>
    <br>
    <br>

    <form action="{{ route('admin.candidate.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <select name="ketua_id" id="ketua_id">
            <option disabled selected>Select Ketua</option>
            @forelse ($user as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @empty
                <option disabled>No Data</option>
            @endforelse
        </select>

        <input type="file" name="ketua_image" id="ketua_image">

        <br>

        <select name="wakil_id" id="wakil_id">
            <option disabled selected>Select Wakil</option>
            @forelse ($user as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @empty
                <option disabled>No Data</option>
            @endforelse
        </select>

        <input type="file" name="wakil_image" id="wakil_image">

        <br>

        <input type="text" name="vision" id="vision">

        <input type="text" name="mission" id="mission">

        <br>

        <button type="submit">
            Submit
        </button>
    </form>

@endsection
