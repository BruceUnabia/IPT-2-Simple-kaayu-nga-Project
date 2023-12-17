@extends('base')

@section('content')
<section class="py-3 py-md-5 py-xl-8">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-12 mx-auto col-md-6 col-xl-5">
                <div class="card border-0 rounded-4">
                    <div class="card-header text-center bg-teal-800 text-white">
                        <h2 class="text-uppercase">Registration Page</h2>
                    </div>
                    <div class="card-body p-3 p-md-4 p-xl-5 rounded-4 shadow">
                        <form action="{{ url('/register') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="John Doe" required>
                                <label for="name" class="form-label">Name</label>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required>
                                <label for="email" class="form-label">Email</label>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" required>
                                <label for="password" class="form-label">Password</label>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="" placeholder="Password Confirmation" required>
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-lg" type="submit" style="background-color: teal; color:#ffff">Register</button>
                            </div>

                        </form>
                        <p class="mt-3">Already have an account? <a href="{{ url('/') }}">Sign in</a></p>
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

    .register-title {
        border-bottom: 2px solid #142f5d;
        margin-bottom: 20px;
        padding-bottom: 10px;
    }

    .register-title h2 {
        color: #142f5d;
        font-size: 24px;
    }
</style>
