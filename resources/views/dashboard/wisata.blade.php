@extends('layouts.dashboard')
@section('dashboard')

<div class="pb-4">
    <div class="float-start mb-4">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahwisata">
            Add New Destination
        </button>
    </div>
    <div class="float-end mb-4">
        <!-- <form action="" method="get"> -->
        <select name="categori" class="form-select" id="categoti">
            <option selected>category</option>
            @foreach($categoris as $categori)
            <option value="{{$categori->id}}">{{$categori->nama}}</option>
            @endforeach
        </select>
        <!-- </form> -->
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahwisata" tabindex="-1" aria-labelledby="tambahwisataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahwisataLabel">Form Add New Destination</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/wisata" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama') }}" placeholder="name destination" required>
                        <label for="nama">Destination Name</label>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select class="form-select @error('categori_id') @enderror" name="categori_id"
                            aria-label="Default select example" required>
                            @foreach($categoris as $categori)
                            @if(old('categori_id') == $categori->id)
                            <option value="{{$categori->id}}" selected>{{$categori->nama}}</option>
                            @else
                            <option value="{{$categori->id}}">{{$categori->nama}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('categori_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('addres') is-invalid @enderror" id="addres"
                            name="addres" placeholder="Addres" value="{{ old('addres') }}" required>
                        <label for="addres">Addres</label>
                        @error('addres')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control @error('maps') is-invalid @enderror" placeholder="Maps" id="Maps"
                            name="maps" value="{{ old('maps') }}" required></textarea>
                        <label for="Maps">Maps</label>
                        @error('maps')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        @error('deskripsi')
                        <div class="alert alert-danger my-3" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="deskripsi">Description</label>
                        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}" required>
                        <trix-editor input="deskripsi"></trix-editor>
                    </div>
                    <div class="mb-3">
                        @error('fasilitas')
                        <div class="alert alert-danger my-3" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="fasilitas">Fasilitas</label>
                        <input id="fasilitas" type="hidden" name="fasilitas" value="{{ old('fasilitas') }}" required>
                        <trix-editor input="fasilitas"></trix-editor>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('tiket_price') is-invalid @enderror"
                            id="tiket_price" name="tiket_price" placeholder="Ticket Price"
                            value="{{ old('tiket_price') }}" required>
                        <label for="tiket_price">Ticket Price</label>
                        @error('tiket_price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        @error('jam_buka')
                        <div class="alert alert-danger my-3" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="jam_buka">Open</label>
                        <input id="jam_buka" type="hidden" name="jam_buka" value="{{ old('jam_buka') }}" required>
                        <trix-editor input="jam_buka"></trix-editor>
                    </div>
                    <div class="mb-3">
                        @error('rute')
                        <div class="alert alert-danger my-3" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="rute">Rute</label>
                        <input id="rute" type="hidden" name="rute" value="{{ old('rute') }}" required>
                        <trix-editor input="rute"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <!-- <div class="upload__box">
                            <div class="upload__btn-box">
                                <label class="upload__btn">
                                    <p>Upload images</p>
                                    <input class="upload__inputfile" type="file" id="image" name="image[]" multiple
                                        required>
                                </label>
                            </div>
                            <div class="upload__img-wrap"></div>
                        </div> -->
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image[]" multiple required>
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="upload__img-wrap"></div>
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
            <th scope="col">Kategori</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($wisatas as $wisata)
        <tr class="">
            <td scope="row">{{$loop->iteration}}</td>
            <td>{{$wisata->nama}}</td>
            <td>{{$wisata->categori->nama}}</td>
            <td>
                <a type="button" class="badge bg-primary text-decoration-none" data-bs-toggle="modal"
                    data-bs-target="#{{$wisata->slug}}">
                    Detail
                </a>
                <a type="button" class="badge bg-success text-decoration-none" data-bs-toggle="modal"
                    data-bs-target="#edit{{$wisata->slug}}">
                    Edit
                </a>
                <form action="/dashboard/wisata/{{$wisata->id}}" method="post" class="d-inline">
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
@foreach($wisatas as $wisata)
<!-- modea detail data -->
<div class="modal fade" id="{{$wisata->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Wisata</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>{{$wisata->nama}}</h3>
                {!! $wisata->maps !!}
                @foreach(explode(',', $wisata->image) as $img)
                <img src="{!! $img !!}" class="img-fluid w-100">
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
<!-- akhir modal detail -->
<!-- modal edit data -->
<div class="modal fade" id="edit{{$wisata->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Destination</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/wisata/{{$wisata->id}}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama',$wisata->nama) }}" placeholder="name destination" required>
                        <label for="nama">Destination Name</label>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select class="form-select @error('categori_id') @enderror" name="categori_id"
                            aria-label="Default select example" required>
                            @foreach($categoris as $categori)
                            @if(old('categori_id',$wisata->categori_id) == $categori->id)
                            <option value="{{$categori->id}}" selected>{{$categori->nama}}</option>
                            @else
                            <option value="{{$categori->id}}">{{$categori->nama}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('categori_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('addres') is-invalid @enderror" id="addres"
                            name="addres" placeholder="Addres" value="{{ old('addres',$wisata->addres) }}" required>
                        <label for="addres">Addres</label>
                        @error('addres')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control @error('maps') is-invalid @enderror" placeholder="Maps" id="Maps"
                            name="maps" required>{{ old('maps',$wisata->maps) }}</textarea>
                        <label for="Maps">Maps</label>
                        @error('maps')
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
                        <input id="deskripsi" type="hidden" name="deskripsi"
                            value="{{ old('deskripsi',$wisata->deskripsi) }}">
                        <trix-editor input="deskripsi"></trix-editor>
                    </div>
                    <div class="mb-3">
                        @error('fasilitas')
                        <div class="alert alert-danger my-3" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="fasilitas">Fasilitas</label>
                        <input id="fasilitas" type="hidden" name="fasilitas"
                            value="{{ old('fasilitas',$wisata->fasilitas) }}">
                        <trix-editor input="fasilitas"></trix-editor>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text"
                            class="form-control @error('tiket_price',$wisata->tiket_price) is-invalid @enderror"
                            id="tiket_price" name="tiket_price" placeholder="Ticket Price"
                            value="{{ old('tiket_price',$wisata->tiket_price) }}" required>
                        <label for="tiket_price">Ticket Price</label>
                        @error('tiket_price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        @error('jam_buka')
                        <div class="alert alert-danger my-3" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="jam_buka">Open</label>
                        <input id="jam_buka" type="hidden" name="jam_buka"
                            value="{{ old('jam_buka',$wisata->jam_buka) }}" required>
                        <trix-editor input="jam_buka"></trix-editor>
                    </div>
                    <div class="mb-3">
                        @error('rute')
                        <div class="alert alert-danger my-3" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="rute">Rute</label>
                        <input id="rute" type="hidden" name="rute" value="{{ old('rute',$wisata->rute) }}" required>
                        <trix-editor input="rute"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image[]" multiple>
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="upload__img-wrap"></div>
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
<!-- akhir modal edit -->
@endforeach
<div class="mt-4">
    {{$wisatas->links()}}
</div>

<script type="text/javascript">
$('#categori').on('change', function() {
    $value = $(this).val();
    $.ajax({
        type: 'get',
        url: '/dashboard/wisata',
        data: {
            'categori': $value
        },
        success: function(data) {
            $('tbody').html(data);
        }
    });
})
</script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'csrftoken': '{{ csrf_token() }}'
    }
});
</script>
@endsection