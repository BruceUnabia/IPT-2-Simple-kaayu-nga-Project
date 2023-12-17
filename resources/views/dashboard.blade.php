@extends('base')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header bg-primary text-white">
                    Cars
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total Cars</h5>
                    <p class="card-text">{{ $carCount }}</p>
                </div>
            </div>
        </div>
        @role('admin')
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header bg-success text-white">
                    Users
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">{{ $userCount }}</p>
                </div>
            </div>
        </div>
        @endrole
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header bg-info text-white">
                    Cars Sold
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total Cars Sold</h5>
                    <p class="card-text">{{ $successfulCarPurchases }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .container {
        max-width: 800px;
    }
    .card-header {
        font-weight: bold;
    }
    .card {
        margin-top: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,.2);
    }
</style>
@endsection
