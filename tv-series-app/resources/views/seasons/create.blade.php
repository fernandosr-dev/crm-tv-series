@extends('layouts.main')

@section('content')
    <h1>Create a New Season for {{ $series->name }}</h1>

    <form action="{{ route('seasons.store', ['seriesId' => $series->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Season Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" name="release_date" id="release_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Season Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <input type="hidden" name="series_id" value="{{ $series->id }}">

        <button type="submit" class="btn btn-primary">Create Season</button>
    </form>
@endsection
