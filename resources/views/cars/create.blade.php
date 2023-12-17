@extends('base')

@section('content')
<div class="container" style="max-width: 600px;">
    <div class="text-end">
        <a href="{{ route('cars.index') }}" class="btn btn-secondary m-3">Back</a>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <h1 class="fw-bold">New Car</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Car Image:</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Model:</label>
                    <input type="text" class="form-control" id="model" name="model" required>
                </div>
                <div class="mb-3">
                    <label for="make" class="form-label">Make:</label>
                    <input type="text" class="form-control" id="make" name="make" required>
                </div>
                <div class="mb-3">
                    <label for="year" class="form-label">Year:</label>
                    <input type="number" class="form-control" id="year" name="year" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Car</button>
            </form>
        </div>
    </div>
</div>
@endsection
