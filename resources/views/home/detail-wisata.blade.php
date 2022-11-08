@extends('layouts.home')
@section('home')
<main id="main">
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 100px;">
                <div class="align-items-stretch">
                    <div class="content shadow">
                        <div class="text-center">
                            <h5 class="card-title m-4 text-black">{{$wisata->nama}}</h5>
                            <!-- Swiper -->
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach(explode(',', $wisata->image) as $img)
                                    <div class="swiper-slide">
                                        <img src="{!! $img !!}" />
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>

                            <div class="card-body">
                                <!-- <div class="bg-secondary mx-5 rounded-pill"> -->
                                <ul class="nav nav-pills my-3 justify-content-center" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-overview-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-overview" type="button" role="tab"
                                            aria-controls="pills-overview" aria-selected="true">Overview</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-lokasi-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-lokasi" type="button" role="tab"
                                            aria-controls="pills-lokasi" aria-selected="false">Lokasi</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-rute-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-rute" type="button" role="tab"
                                            aria-controls="pills-rute" aria-selected="false">Rute</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-harga-tiket-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-harga-tiket" type="button" role="tab"
                                            aria-controls="pills-" aria-selected="false">Harga Tiket</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-fasilitas-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-fasilitas" type="button" role="tab"
                                            aria-controls="pills-" aria-selected="false">Fasilitas</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-jam_buka-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-jam_buka" type="button" role="tab"
                                            aria-controls="pills-" aria-selected="false">Jam Buka</button>
                                    </li>
                                </ul>
                                <!-- </div> -->
                            </div>

                            <div class="tab-content text-black" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
                                    aria-labelledby="pills-overview-tab" tabindex="0">
                                    {!! $wisata->deskripsi !!}
                                </div>
                                <div class="tab-pane fade" id="pills-lokasi" role="tabpanel"
                                    aria-labelledby="pills-lokasi-tab" tabindex="0">{!! $wisata->maps !!}</div>
                                <div class="tab-pane fade" id="pills-rute" role="tabpanel"
                                    aria-labelledby="pills-rute-tab" tabindex="0">{!!$wisata->rute!!}</div>
                                <div class="tab-pane fade" id="pills-harga-tiket" role="tabpanel"
                                    aria-labelledby="pills-harga-tiket-tab" tabindex="0">{{$wisata->tiket_price}}
                                </div>
                                <div class="tab-pane fade" id="pills-fasilitas" role="tabpanel"
                                    aria-labelledby="pills-fasilitas-tab" tabindex="0">{!!$wisata->fasilitas!!}</div>
                                <div class="tab-pane fade" id="pills-jam_buka" role="tabpanel"
                                    aria-labelledby="pills-jam_buka-tab" tabindex="0">{!!$wisata->jam_buka!!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        </div>
    </section>

    <div class="container">
        <div class="card p-2">
            <h1 class="text-center mt-2"><strong>Pernah Kesini??</strong></h1>
            <p class="text-center">Jika sudah pernah, yuk berikan komen untuk tempat wisata ini</p>
            <div class="row g-2">
                <div class="col-md-6 col-12 px-2">
                    <div class="p-5 border bg-white shadow-sm">
                        <h4 class="text-center mt-2"> Komentar</h4>
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputnama1" class="form-label">Nama</label>
                                <input type="name" class="form-control" id="exampleInputnama1"
                                    aria-describedby="namaHelp">
                                <div id="namaHelp" class="form-text">We'll never share your nama with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputkomentar1" class="form-label">Komentar</label>
                                <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-12 px-2">
                    <div class="p-5 border bg-white shadow-sm">
                        <h4 class="text-center mt-2">Daftar Komentar</h4>
                        <div class="mb-3 mt-4">
                            <input type="name" class="form-control" id="exampleInputnama1" aria-describedby="namaHelp">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Why Us Section -->

</main>
@endsection