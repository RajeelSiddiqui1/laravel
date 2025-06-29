@extends('layout.app')

<div class="container my-5">
<div class="row my-3 justify-content-center">
    <div class="col-md-6">
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center shadow-sm border-0" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                <div class="flex-grow-1">
                    {{ Session::get('error') }}
                </div>
                <button type="button" class="btn-close ms-2" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
</div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-dark text-white text-center rounded-top-4 py-3">
                    <h3 class="mb-0">👤 User Registration</h3>
                </div>
                <div class="card-body bg-light rounded-bottom-4 p-4">
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text"
                                class="form-control rounded-3 @error('name') is-invalid @enderror"
                                id="name" name="name"
                                placeholder="John Doe"
                                value="{{ old('name') }}">
                            <label for="name">Username</label>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email"
                                class="form-control rounded-3 @error('email') is-invalid @enderror"
                                id="email" name="email"
                                placeholder="name@example.com"
                                value="{{ old('email') }}">
                            <label for="email">Email address</label>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3 position-relative">
                            <input type="password"
                                class="form-control rounded-3 @error('password') is-invalid @enderror"
                                id="password" name="password"
                                placeholder="Password">
                            <label for="password">Password</label>
                            <span class="position-absolute top-50 end-0 translate-middle-y pe-3">
                                <i class="bi bi-eye-slash toggle-password" toggle="#password" style="cursor: pointer;"></i>
                            </span>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4 position-relative">
                            <input type="password"
                                class="form-control rounded-3 @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation"
                                placeholder="Confirm Password">
                            <label for="password_confirmation">Confirm Password</label>
                            <span class="position-absolute top-50 end-0 translate-middle-y pe-3">
                                <i class="bi bi-eye-slash toggle-password" toggle="#password_confirmation" style="cursor: pointer;"></i>
                            </span>
                            @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-3 py-2">Register</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center bg-white border-top-0 py-3">
                    <small>Already have an account? <a href="{{ route('auth.loginview') }}">Login</a></small>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.querySelectorAll('.toggle-password').forEach(icon => {
        icon.addEventListener('click', function() {
            const input = document.querySelector(this.getAttribute('toggle'));
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    });
</script>