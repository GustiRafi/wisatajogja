@extends('layouts.dashboard')
@section('dashboard')

<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambahcategori">
    Add New Categori
</button>

<!-- Modal -->
<div class="modal fade" id="tambahcategori" tabindex="-1" aria-labelledby="tambahcategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahcategoriLabel">Form Add New Categori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/categori" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" placeholder="name categori" value="{{ old('nama') }}" required>
                        <label for="nama">Categori Name</label>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">image</label>
                        <img class="d-block img-preview img-fluid mb-3 col-sm-5" id="output">
                        <input class="form-control @error('image')is-invalid @enderror" type="file" id="image"
                            name="image" onchange="loadFile(event)">
                        @error('image')
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
            <!-- <th scope="col"></th> -->
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categoris as $categori)
        <tr class="">
            <td scope="row">{{$loop->iteration}}</td>
            <td>{{$categori->nama}}</td>
            <!-- <td></td> -->
            <td>
                <a type="button" class="badge bg-primary text-decoration-none" data-bs-toggle="modal"
                    data-bs-target="#{{$categori->slug}}">
                    Detail
                </a>
                <a type="button" class="badge bg-success text-decoration-none" data-bs-toggle="modal"
                    data-bs-target="#edit{{$categori->slug}}">
                    Edit
                </a>
                <form action="/dashboard/categori/{{$categori->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="oldimage" name="oldimage" value="{{$categori->image}}">
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
@foreach($categoris as $categori)
<!-- modea detail data -->
<div class="modal fade" id="{{$categori->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>{{$categori->nama}}</h3>
                <img src="{{ asset('storage/' . $categori->image) }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Exit</button>
            </div>
        </div>
    </div>
</div>
<!-- akhir modal detail -->
<!-- modal edit data -->
<div class="modal fade" id="edit{{$categori->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Edit Categori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/categori/{{ $categori->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" placeholder="name categori" value="{{ old('nama', $categori->nama) }}" required>
                        <label for="nama">Categori Name</label>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="hidden" class="form-control" id="slug" name="slug" placeholder="slug"
                            value="{{ old('slug',$categori->slug) }}" hidden>
                        <label for="slug">Slug</label>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">image</label>
                        <input type="text" name="oldimage" id="oldimage" value="{{ $categori->image }}" hidden>
                        @if($categori->image)
                        <img src="{{ asset('storage/' . $categori->image) }}" class="d-block img-fluid mb-3 col-sm-5"
                            id="output">
                        @else
                        <img class="d-block img-fluid mb-3 col-sm-5" id="output">
                        @endif
                        <input class="form-control @error('image')is-invalid @enderror" type="file" id="image"
                            name="image" onchange="loadFile(event)">
                        @error('image')
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