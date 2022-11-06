@extends('layouts.dashboard')
@section('dashboard')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@foreach($covers as $cover)
<div class="row row-cols-1 row-cols-lg-2 m-lg-3 justify-content-center">
    <div class="col">
        <h2>Change jumbotron backgroud</h2>
        <form action="/settings/cover/{{$cover->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="oldimage" value="{{$cover->image}}">
            @if($cover->image)
            <img src="{{ asset('storage/' . $cover->image) }}" class="d-block img-fluid mb-3 col-sm-5" id="output">
            @else
            <img class="d-block img-fluid mb-3 col-sm-5" id="output">
            @endif
            <input class="form-control @error('image')is-invalid @enderror" type="file" id="image" name="image"
                onchange="loadFile(event)">
            @error('image')
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