@extends('base')

@section('content')
<section class="py-3 py-md-5 py-xl-8">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-12 mx-auto col-md-6 col-xl-5">
                <div class="card border-0 rounded-1 shadow">
                    <div class="card-header text-center bg-teal-800 text-white">
                        <h2 class="text-uppercase">Login Page</h2>
                    </div>
                    <div class="card-body p-3 p-md-4 p-xl-5 rounded-4">
                        @if(session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ url('/login') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="" required>
                                <label for="email" class="form-label">Email</label>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="password" value="" placeholder="" required>
                                <label for="password" class="form-label">Password</label>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-lg" type="submit" style="background-color:teal; color:#ffff">Login</button>
                            </div>
                            @method('POST')
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex gap-2 gap-md-4 mt-4">
                                    <p>Don't have an account? <a href="{{ url('/register') }}">Sign up</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<style>
    .bg-teal-800 {
        background-color: #004d4d;
    }
</style>
