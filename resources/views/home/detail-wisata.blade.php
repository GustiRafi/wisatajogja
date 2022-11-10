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
    width: 75%;
    height: 75%;
    object-fit: cover;
}
</style>
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
                                            aria-controls="pills-overview" aria-selected="true">overview</button>
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
            <div class="m-3">
                <div id="disqus_thread"></div>
                <script>
                /**
                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                /*
                var disqus_config = function () {
                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                */
                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document,
                        s = d.createElement('script');
                    s.src = 'https://wonderfullyogyakarta.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                        powered by Disqus.</a></noscript>
            </div>
        </div>
    </div>
    <!-- End Why Us Section -->

</main>
@endsection