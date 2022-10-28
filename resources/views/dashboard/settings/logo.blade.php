@extends('layouts.dashboard')
@section('dashboard')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@foreach($logos as $logo)
<div class="row row-cols-1 row-cols-lg-2 m-lg-3 justify-content-center">
    <div class="col">
        <h2>Change Logo</h2>
        <form action="/settings/logo/{{$logo->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="oldlogo" value="{{$logo->logo}}">
            @if($logo->logo)
            <img src="{{ asset('storage/' . $logo->logo) }}" class="d-block img-fluid mb-3 col-sm-5" id="output">
            @else
            <img class="d-block img-fluid mb-3 col-sm-5" id="output">
            @endif
            <input class="form-control @error('logo')is-invalid @enderror" type="file" id="logo" name="logo"
                onchange="loadFile(event)">
            @error('logo')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <button type="submit" class="btn btn-primary mt-4 w-100">Update</button>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection