@extends('layouts.admin.parent')

@section('title', 'Admin Dashboard')

@section('content')

<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>

<h1>ADMIN DASHBOARD</h1>

<a href="{{ route('admin.candidate.index') }}">Candidate</a>

@endsection