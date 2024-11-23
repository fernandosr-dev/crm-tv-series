@extends('layouts.main')

@section('content')
    <h1>Add New Episode for {{ $season->name }}</h1>

    <form action="{{ route('episodes.store', ['seriesId' => $series->id, 'seasonId' => $season->id]) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="number" class="form-label">Episode Number</label>
            <input type="number" name="number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Episode Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" name="release_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration (minutes)</label>
            <input type="number" name="duration" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Episode</button>
    </form>
@endsection
