@extends('layouts.home')
@section('home')
<link rel="stylesheet" href="sweetalert2.min.css">
<main id="main">
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 100px;">
                <div class="align-items-stretch">
                    <div class="content shadow pb-5">
                        <div class="text-center">
                            <h3 class="card-title m-4 text-black"><strong>Tambah Wiasta</strong></h3>
                            <h4 class="text-black">Halo Sahabat Wonderful Yogyakarta, Kalian menambahkan tempat wisata
                                baru yang belum ada di Wonderfull Yogyakarta.Nantinya pihak kami akan meninjau tempat
                                wisata tersebut.Teriam Kasih..</h4>
                            <!-- Swiper -->

                        </div>
                            <form action="/daftarkan-wisata" method="post" class="text-black" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-center mt-5 mb-3">
                                    <div class="col-md-6 col-12">
                                        <label for="name" class="form-label text-black">Nama</label>
                                        <input type="text" class="form-control" id="name" aria-describedby="namaHelp"
                                            name="uploader_name" required>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="email" class="form-label text-black">Pastikan isi dengan email asli</label>
                                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                            name="uploader_email" required>
                                    </div>
                                </div>
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
                                <button type="submit" class="btn btn-primary float-end mb-3 ">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>

    </div>
    <!-- End Why Us Section -->

</main>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
@if(session('success'))
<script>
    Swal.fire(
        'Succes!',
        'Data Wisata Berhasil Terkirim',
        'success'
    );
</script>
@endif
@endsection