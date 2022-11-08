@extends('layouts.home')
@section('home')
<main id="main">
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 100px;">
                <div class="col-lg-10 col-md-6 col-sm-10 d-flex align-items-stretch">
                    <div class="content shadow">
                        <div class="row">
                            @foreach($wisatas as $wisata)
                            <div class="col-lg-4 col-md-5 col-sm-10 p-3">
                                <a href="/detail-wisata/{{$wisata->slug}}">
                                    <img src="/assets/img/gambar1.png" alt="" style="max-width: 200px;">
                                    <div class="card-body">
                                        <h5 class="card-title m-4">Card title</h5>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="text-center container mt-5">
            <img src="/assets/img/WISATA TERPOPULER.png" alt="">
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
                                        <img src="/assets/img/Group 52.png" class="img-fluid rounded-start m-4"
                                            alt="...">
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
                                        <img src="/assets/img/Group 52.png" class="img-fluid rounded-start m-4"
                                            alt="...">
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
                                        <img src="/assets/img/Group 52.png" class="img-fluid rounded-start m-4"
                                            alt="...">
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
                                        <img src="/assets/img/Group 52.png" class="img-fluid rounded-start m-4"
                                            alt="...">
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
                                        <img src="/assets/img/Group 52.png" class="img-fluid rounded-start m-4"
                                            alt="...">
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
                                        <img src="/assets/img/Group 52.png" class="img-fluid rounded-start m-4"
                                            alt="...">
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
    <!-- End Why Us Section -->

</main>
@endsection