@extends('layouts.dashboard')
@section('dashboard')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2><b>Edit Contact</b></h2>
@foreach($contact as $row)
<form action="/settings/contact/{{$row->id}}" method="post">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('addres') is-invalid @enderror" name="addres" id="addres"
            placeholder="addres" value="{{old('addres',$row->addres)}}" required>
        <label for="addres">Addres</label>
        @error('addres')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
            placeholder="email" value="{{old('email',$row->email)}}" required>
        <label for="email">Email</label>
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp"
            placeholder="no_telp" value="{{old('no_telp',$row->no_telp)}}" required>
        <label for="no_telp">Telp</label>
        @error('no_telp')
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