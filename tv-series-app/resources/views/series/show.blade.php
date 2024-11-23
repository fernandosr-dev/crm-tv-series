@extends('layouts.main')

@section('content')
    <h1>{{ $serie->name }} - Seasons</h1>

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
                        <img src="{{ asset('storage/' . $season->photo) }}" width="100">
                    </td>
                    <td>{{ $season->name }}</td>
                    <td>{{ $season->release_date }}</td>
                    <td>{{ $season->episodes_count }}</td>
                    <td>
                        <div>
                            <a href="{{ route('seasons.show', [$serie->id, $season->id]) }}" class="btn btn-primary">View</a>
                            <form action="{{ route('seasons.destroy', [$serie->id, $season->id]) }}" method="POST"
                                  style="display:inline;">
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
