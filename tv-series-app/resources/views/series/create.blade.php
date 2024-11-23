@extends('layouts.main')

@section('content')
    <h1>Add New Series</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Series Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Image</label>
            <input type="file" name="photo" id="photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add New TV Serie</button>
    </form>
@endsection
