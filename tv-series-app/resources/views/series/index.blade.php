@extends('layouts.main')

@section('content')

    <h1>All TV Series</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('series.create') }}" class="btn btn-success mb-3">Add New Series</a>

    <table class="table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Seasons</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($series as $serie)
            <tr>
                <td><img src="{{ asset('storage/' . $serie->photo) }}" width="100"></td>
                <td>{{ $serie->name }}</td>
                <td>{{ $serie->seasons_count }}</td>
                <td>
                    <a href="{{ route('seasons.index', $serie->id) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('series.destroy', $serie->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
