@extends('layouts.home')
@section('home')
<section>
    <div class="container">
        <div class="container text-center mt-5">
            <div class="row g-2 mt-5">
                @foreach($categoris as $categori)
                <div class="col-lg-3 col-md-4 col-sm-6 mt-3">
                    <a href="/wisata-jogja/{{$categori->slug}}">
                        <div class="card  text card-image" style="border-radius:28px ;">
                            <img src="{{ asset('storage/' . $categori->image) }}" class="card-img asu"
                                alt="{{$categori->nama}}">
                            <div class="card-img-overlay">
                                <h5 class="card-titlel mt-5"><strong>{{$categori->nama}}</strong></h5>
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
    <div class="text-center container">
        {{-- <img src="/assets/img/WISATA YOGYAKARTA.png" alt=""> --}}
        <h1 class="text-danger"><strong>WISATA YOGYAKARTA</strong></h1>
        <div class="card mb-3" >
            <div class="row g-0">
              <div class="col-md-4">
                <img src="/storage/{{ $about->image }}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                {!! $about->deskripsi !!}
                </div>
              </div>
            </div>
          </div>
    </div>
</section>
<!-- <section>
    <div class="text-center container">
        <img src="/assets/img/WISATA TERPOPULER.png" alt="">
    </div>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <!-- <div class="container overflow-hidden text-center mt-4 "> -->
            <!-- <div class="card" style="max-width:1000px;">
                <div class="row gy-5">
                    <div class="col-6">
                        <div class="card-none mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="/assets/img/Group 52.png" class="img-fluid rounded-start m-4" alt="...">
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
                                    <img src="/assets/img/Group 52.png" class="img-fluid rounded-start m-4" alt="...">
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
                                    <img src="/assets/img/Group 52.png" class="img-fluid rounded-start m-4" alt="...">
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
                                    <img src="/assets/img/Group 52.png" class="img-fluid rounded-start m-4" alt="...">
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
                                    <img src="/assets/img/Group 52.png" class="img-fluid rounded-start m-4" alt="...">
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
                                    <img src="/assets/img/Group 52.png" class="img-fluid rounded-start m-4" alt="...">
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
            <!-- </div>
        </div> -->
    <!-- </div>
</section> -->
@endsection
