@extends('layouts.home')
@section('home')
<style>
.swiper {
    width: 100%;
    height: 100%;
}

.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;

    /* Center slide text vertically */
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
}

.swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>
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
                                    <div class="mb-3">
                                        <div class="swiper mySwiper">
                                            <div class="swiper-wrapper">
                                                @foreach(explode(',', $wisata->image) as $img)
                                                <div class="swiper-slide"><img src="{!! $img !!}" alt=""
                                                        style="max-width: 200px;"></div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title m-4">{{$wisata->nama}}</h5>
                                        </div>
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

    <!-- <section>
        <div class="text-center container mt-5">
            <img src="/assets/img/WISATA TERPOPULER.png" alt="">
        </div>
        <div class="container mt-5">
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
    </div>
    </div>
    </section> -->
    <!-- End Why Us Section -->

</main>
@endsection