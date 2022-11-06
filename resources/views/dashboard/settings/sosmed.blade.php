@extends('layouts.dashboard')
@section('dashboard')

<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambahsosmed">
    Add New sosmed
</button>

<!-- Modal -->
<div class="modal fade" id="tambahsosmed" tabindex="-1" aria-labelledby="tambahsosmedLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahsosmedLabel">Form Add New sosmed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/settings/media-sosial" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="name sosmed" value="{{ old('name') }}" required>
                        <label for="name">sosmed Name</label>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon"
                            name="icon" placeholder="icon sosmed" value="{{ old('icon') }}" required>
                        <label for="icon">sosmed icon</label>
                        @error('icon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url"
                            placeholder="url sosmed" value="{{ old('url') }}" required>
                        <label for="url">sosmed url</label>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Exit</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <div class="table-responsive"> -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<table class="table table-hover">
    <thead class="bg-primary">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">icon</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sosmeds as $sosmed)
        <tr class="">
            <td scope="row">{{$loop->iteration}}</td>
            <td>{{$sosmed->name}}</td>
            <td>{!!$sosmed->icon!!}</td>
            <td>
                <a class="badge bg-primary text-decoration-none" href="{{$sosmed->url}}">
                    cek link
                </a>
                <a type="button" class="badge bg-success text-decoration-none" data-bs-toggle="modal"
                    data-bs-target="#edit{{$sosmed->id}}">
                    Edit
                </a>
                <form action="/settings/media-sosial/{{$sosmed->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="badge bg-danger border-0"
                        onclick="return confirm('Are you sure delete this data?')"><i
                            class="bi bi-trash">delete</i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- </div> -->
@foreach($sosmeds as $sosmed)
<!-- modal edit data -->
<div class="modal fade" id="edit{{$sosmed->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Edit sosmed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/settings/media-sosial/{{ $sosmed->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="name sosmed" value="{{ old('name', $sosmed->name) }}" required>
                        <label for="name">sosmed Name</label>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon"
                            name="icon" placeholder="name sosmed" value="{{ old('icon', $sosmed->icon) }}" required>
                        <label for="icon">sosmed icon</label>
                        @error('icon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url"
                            placeholder="name sosmed" value="{{ old('url', $sosmed->url) }}" required>
                        <label for="url">sosmed url</label>
                        @error('url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Exit</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- akhir modal edit -->
@endforeach
@endsection