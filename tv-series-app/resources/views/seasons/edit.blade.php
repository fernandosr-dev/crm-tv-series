@extends('layouts.main')

@section('content')

    <h1>Edit Season: {{ $season->name }} from {{ $series->name }}</h1>

    <form action="{{ route('seasons.update', ['seriesId' => $series->id, 'seasonId' => $season->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Season Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $season->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" name="release_date" id="release_date" class="form-control" value="{{ old('release_date', $season->release_date) }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Season Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($season->image)
                <img src="{{ asset('storage/' . $season->image) }}" width="100" alt="Season Image">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Season</button>
    </form>

@endsection
