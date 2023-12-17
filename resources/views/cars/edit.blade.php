@extends('base')

@section('content')
<div class="container" style="max-width: 600px;">
    <div class="text-end">
        <a href="{{ route('cars.index') }}" class="btn btn-secondary m-3">Back</a>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <h1 class="fw-bold">Edit Car</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Add the method spoofing for PUT request -->
                <input type="hidden" name="car_id" value="{{ $car->id }}"> <!-- Add a hidden input for car ID -->
                <div class="mb-3">
                    <label for="image" class="form-label">Car Image:</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Model:</label>
                    <input type="text" class="form-control" id="model" name="model" value="{{ $car->model }}" required>
                </div>
                <div class="mb-3">
                    <label for="make" class="form-label">Make:</label>
                    <input type="text" class="form-control" id="make" name="make" value="{{ $car->make }}" required>
                </div>
                <div class="mb-3">
                    <label for="year" class="form-label">Year:</label>
                    <input type="number" class="form-control" id="year" name="year" value="{{ $car->year }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description" required>{{ $car->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Car</button>
            </form>
        </div>
    </div>
</div>
@endsection
