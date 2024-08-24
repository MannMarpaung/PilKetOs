@extends('layouts.admin.parent')

@section('title', 'Admin Dashboard - User')

@section('content')

<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>

<h1>ADMIN DASHBOARD - USER</h1>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>username</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($user as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
            </tr>
        @empty
            NO DATA
        @endforelse
    </tbody>
</table>

@endsection