@extends('base')

@section('content')
<div class="container mt-4 mb-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="text-xl leading-6 font-semibold text-gray-900">Car Listings</h4>
            @role('admin')
            <div>
                <a href="{{ route('cars.create') }}" class="btn btn-success">Add New Car</a>
            </div>
            @endrole
        </div>
        <div class="card-body">
            <div class="row" id="car-list">
                @foreach($cars as $car)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            {{-- {{ $car->image }} --}}
                        <img class="card-img-top img-fluid" src="{{ asset($car->image) }}" alt="{{ $car->make }} {{ $car->model }}" style="object-fit: cover; height: 200px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">
                                    {{ $car->make }} {{ $car->model }} - {{ $car->year }} (Stock: {{ $car->stocks }})
                                </h5>
                                <p class="card-text flex-grow-1">{{ $car->description }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    @role('admin')
                                    <div>
                                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this car?')">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                    @endrole
                                    @role('client')
                                    <form id="buyForm-{{ $car->id }}" action="{{ route('cars.buy', $car->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success mt-3" onclick="return confirmStock(this);">
                                            <i class="fa-solid fa-credit-card"></i> Buy
                                        </button>
                                    </form>
                                    @endrole
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function confirmStock(button) {
        let carId = button.closest('form').getAttribute('data-id');
        let stocks = parseInt("{{ $car->stocks }}");

        if (stocks <= 0) {
            alert('Sorry, this car is out of stock.');
            return false;
        }

        return confirm('Are you sure you want to buy this car?');
    }
</script>
