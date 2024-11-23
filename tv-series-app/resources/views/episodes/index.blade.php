@extends('layouts.main')

@section('content')
    <h1>All Episodes for {{$series->name }} - {{ $season->name }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div>
        <a href="{{ route('episodes.create', ['seriesId' => $series->id, 'seasonId' => $season->id]) }}" class="btn btn-success mb-3">Add New Episode</a>
        <a href="{{ route('seasons.index', $series->id) }}" class="btn btn-primary">Back to Seasons</a>
    </div>



    <table class="table">
        <thead>
        <tr>
            <th>Episode</th>
            <th>Name</th>
            <th>Release Date</th>
            <th>Duration</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($episodes as $episode)
            <tr>
                <td>{{ $episode->number }}</td>
                <td>{{ $episode->name }}</td>
                <td>{{ $episode->release_date }}</td>
                <td>{{ $episode->duration }}</td>
                <td>
                    <a href="{{ route('episodes.edit', ['seriesId' => $series->id, 'seasonId' => $season->id, 'episodeId' => $episode->id]) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('episodes.destroy', ['seriesId' => $series->id, 'seasonId' => $season->id, 'episodeId' => $episode->id]) }}" method="POST" style="display:inline;">
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
