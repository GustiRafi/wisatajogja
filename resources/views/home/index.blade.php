@extends('layouts.home')
@section('home')
<section>
    <div class="container">
        <div class="container text-center mt-5">
            <div class="row g-2 mt-5">
                @foreach($categoris as $categori)
                <div class="col-lg-3 col-md-4 col-sm-4 mt-3">
                    <a href="/wisata-jogja/{{$categori->slug}}">
                        <div class="card  text" style="border-radius:28px ;">
                            <img src="{{ asset('storage/' . $categori->image) }}" class="card-img asu"
                                alt="{{$categori->nama}}">
                            <div class="card-img-overlay">
                                <h5 class="card-title mt-5 text-white"><strong>{{$categori->nama}}</strong></h5>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section>
    <div class="text-center container mt-3">
        <img src="assets/img/WISATA YOGYAKARTA.png" alt="">
    </div>
    <div class="row justify-content-center mt-5">
        <div class="card mb-3" style="max-width:1000px;">
            <div class="row g-0 justify-content-center">
                <div class="col-md-6">
                    <img src="assets/img/tamansarii 1 (1).png" class="img-fluid rounded-start m-5" alt="...">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title ms-5 mt-3">Daerah Istimewa Yogyakarta</h5>
                        <p class="card-text ms-5">terletak di bagian selatan pulau Jawa, berbatasan dengan provinsi Jawa
                            Tengah. Awalnya, Yogyakarta ialah kerajaan yang meliputi wilayah Kasultanan Ngayogyakarta
                            hadiningrat dan Kadipaten Pakualaman, ditambah bekas wilayah Kasunan Surakarta Hadiningrat
                            dan Praja Mangkunagaran. Nama Daerah Istimewa Yogyakarta mulai digunakan dalam urusan
                            pemerintahan pada 18 Mei 1946, tercantum pada Maklumat Yogyakarta No 18 tahun 1946. Landmark
                            kota ini ialah Tugu Yogyakarta atau yang juga dikenal sebagai Monumen Yogyakarta. Konon,
                            adalah sebuah tradisi untuk berpelukan dan mencium satu sama lain usai menamatkan pendidikan
                            di universitas di Yogyakarta.</p>
                        <h5 class="card-title ms-5">Apa yang dimaksud dengan Destinasi wisata?</h5>
                        <p class="card-text ms-5">Daerah tujuan wisata dapat disebut juga dengan destinasi pariwisata
                            adalah kawasan geografis yang berada dalam satu atau lebih wilayah administrasi yang di
                            dalamnya terdapat daya tarik wisata, fasilitas umum, fasilitas pariwisata, aksesbilitas,
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="text-center container mt-5">
        <img src="assets/img/WISATA TERPOPULER.png" alt="">
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- <div class="container overflow-hidden text-center mt-4 "> -->
            <div class="card" style="max-width:1000px;">
                <div class="row gy-5">
                    <div class="col-6">
                        <div class="card-none mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="assets/img/Group 52.png" class="img-fluid rounded-start m-4" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title m-4">Card title</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-none mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="assets/img/Group 52.png" class="img-fluid rounded-start m-4" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title m-4 ">Card title</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-none mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="assets/img/Group 52.png" class="img-fluid rounded-start m-4" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title m-4 ">Card title</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-none mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="assets/img/Group 52.png" class="img-fluid rounded-start m-4" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title m-4">Card title</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-none mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="assets/img/Group 52.png" class="img-fluid rounded-start m-4" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title m-4">Card title</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-none mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="assets/img/Group 52.png" class="img-fluid rounded-start m-4" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title m-4">Card title</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>
@endsection