@extends('layouts.main')

@section('content')

    <h1>Edit Episode: {{ $episode->name }} from {{ $series->name }} - {{ $season->name }}</h1>

    <form action="{{ route('episodes.update', ['seriesId' => $series->id, 'seasonId' => $season->id, 'episodeId' => $episode->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="number" class="form-label">Episode Number</label>
            <!-- Corrigir para o campo 'number' que é o nome da coluna no banco de dados -->
            <input type="number" name="number" id="number" class="form-control" value="{{ old('number', $episode->number) }}" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Episode Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $episode->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" name="release_date" id="release_date" class="form-control" value="{{ old('release_date', $episode->release_date) }}" required>
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration (in minutes)</label>
            <input type="number" name="duration" id="duration" class="form-control" value="{{ old('duration', $episode->duration) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Episode</button>
    </form>

@endsection
