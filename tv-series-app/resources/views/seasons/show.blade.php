@extends('layouts.main')

@section('content')
    <div>
        <h1>Season: {{ $season->name }}</h1>
        <p>Release Date: {{ $season->release_date }}</p>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Episodes</th>
        </tr>
        </thead>
    </table>

    @foreach($season->episodes as $episode)
        <p>{{ $episode->name }} - {{ $episode->release_date }}</p>
    @endforeach
@endsection
