@extends('layouts.main')

@section('content')

    <h1>{{ $series->name }} - All Seasons</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div>
        <a href="{{ route('seasons.create', ['seriesId' => $series->id]) }}" class="btn btn-success">Add New Season</a>
        <a href="{{ route('series.index') }}" class="btn btn-primary">Back to Series</a>
    </div>

    @if($seasons->isEmpty())
        <p>No seasons available for this series.</p>
    @else

        <table class="table">
            <thead>
            <tr>
                <th>Image</th>
                <th>Season</th>
                <th>Realese Date</th>
                <th>Episodes</th>
                <th>Actions</th>
            </tr>
            </thead>
            @foreach($seasons as $season)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $season->image) }}" width="100">
                    </td>
                    <td>{{ $season->name }}</td>
                    <td>{{ $season->release_date }}</td>
                    <td>{{ $season->episodes_count }}</td>
                    <td>

                        <div>
                            <a href="{{ route('episodes.index', [$series->id, $season->id]) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('seasons.edit', [$series->id, $season->id]) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('seasons.destroy', ['seriesId' => $series->id, 'seasonId' => $season->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
