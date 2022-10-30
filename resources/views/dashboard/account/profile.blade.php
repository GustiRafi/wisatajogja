@extends('layouts.dashboard')
@section('dashboard')
<h2 class="pb-3"><b>Edit Profile</b></h2>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<form action="/account/change-profile/{{auth()->user()->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row row-cols-lg-2 row-cols-1">
        <div class="col-12 col-lg-5 text-center">
            <input type="hidden" name="oldimage" value="{{auth()->user()->image}}">
            <img src="{{ asset('storage/' . auth()->user()->image) }}" class="justify-content-center img-fluid mb-3"
                id="output">
        </div>
        <div class="col-12 col-lg-7">
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    placeholder="name" value="{{old('name',auth()->user()->name)}}" required>
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                    placeholder="email" value="{{old('email',auth()->user()->email)}}" required>
                <label for="email">Email</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image">Photo</label>
                <input class="form-control @error('image')is-invalid @enderror" type="file" id="image" name="image"
                    onchange="loadFile(event)">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Change</button>
            </div>
        </div>
    </div>
</form>
@endsection