@extends('layouts.dashboard')
@section('dashboard')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2><b>Edit About Us</b></h2>
@foreach($about as $row)
<form action="/settings/about/{{$row->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
            placeholder="title" value="{{old('title',$row->title)}}" required>
        <label for="title">Title</label>
        @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <label for="deskripsi">Description</label>
    <div class="form-floating mb-3">
        @error('deskripsi')
        <div class="alert alert-danger my-3" role="alert">
            {{ $message }}
        </div>
        @enderror
        <input id="deskripsi" type="hidden" name="deskripsi" value="{{old('deskripsi',$row->deskripsi)}}">
        <trix-editor input="deskripsi"></trix-editor>
    </div>
    <div class=" mb-3">
        <input type="hidden" name="oldimage" value="{{$row->image}}">
        @if($row->image)
        <img src="{{ asset('storage/' . $row->image) }}" class="d-block img-fluid mb-3 col-sm-5" id="output">
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
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endforeach
@endsection