@extends('layouts.main')

@section('content')

    <h1>Edit Series: {{ $series->name }}</h1>

    <form action="{{ route('series.update', $series->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Series Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $series->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Image</label>
            <input type="file" name="photo" id="photo" class="form-control">
            @if($series->photo)
                <img src="{{ asset('storage/' . $series->photo) }}" width="100" alt="Series Image">
            @endif
        </div>

        <div class="mb-3">
            <label for="seasons_count" class="form-label">Seasons Count</label>
            <input type="number" name="seasons_count" id="seasons_count" class="form-control" value="{{ old('seasons_count', $series->seasons_count) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Series</button>
    </form>

@endsection
