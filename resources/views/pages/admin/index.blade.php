@extends('layouts.admin.parent')

@section('title', 'Dashboard - Admin')

@section('content')

<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>

<h1>DASHBOARD - ADMIN</h1>

@endsection