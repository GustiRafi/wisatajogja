@extends('layouts.dashboard')
@section('dashboard')
<div class="row row-cols-1 justify-content-center">
    <div class="col-8">
        <h2 class="pb-3"><b>Change Password</b></h2>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="/account/change-password" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input type="password" class="form-control @if(session('error1')) is-invalid @endif"
                    name="currentpassword" id="currentpassword" placeholder="currentpassword"
                    value="{{old('currentpassword')}}" required>
                <label for="currentpassword">Current Password</label>
                @if(session('error1'))
                <div class="invalid-feedback">
                    {{ session('error1') }}
                </div>
                @endif
            </div>
            <div class="form-floating mb-3">
                <input type="password"
                    class="form-control @if(session('error2')) is-invalid @endif @error('password') is-invalid @enderror"
                    name="password" id="password" placeholder="password" required>
                <label for="password">New Password</label>
                @if(session('error2'))
                <div class="invalid-feedback">
                    {{ session('error2') }}
                </div>
                @endif
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control @if(session('error3')) is-invalid @endif"
                    name="confirmpassword" id="confirmpassword" placeholder="confirmpassword" required>
                <label for="confirmpassword">Confirm Password</label>
                @if(session('error3'))
                <div class="invalid-feedback">
                    {{ session('error3') }}
                </div>
                @endif
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" onclick="showpassword()" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Show Password
                </label>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Change</button>
            </div>
        </form>
    </div>
</div>
@endsection