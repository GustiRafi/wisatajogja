<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Wonderful Yogyakarta</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    @foreach($logos as $brand)
    <link rel="shortcut icon" href="/storage/{{ $brand->logo }}" />
    @endforeach
    {{-- <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon" /> --}}

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet" />
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: Medilab - v4.9.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        }
    body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
    }

    </style>
</head>

<body>

    <section id="hero" class="d-flex align-items-center">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top" id="navbar">
            <div class="container text-white" id="navCont">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item ms-2">
                            <a class="nav-link outline-none" href="/">Home</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link outline-none" href="/contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- akhir navbar -->
        <div class="container">
            <div class="text-center container">
                @foreach($logos as $brand)
                <img src="/storage/{{ $brand->logo }}" class="img-fluid" alt="">
                @endforeach
                <div class="row  justify-content-center mt-4">
                    <div class="col-lg-5 col-md-4 col-sm-6">
                        <div class="input-group mb-3">
                            <button class="form-control" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><i class="bi bi-search float-start pe-1">Cari
                                    Wisata</i></button>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <input type="search" class="form-control" id="wisata" name="wisata"
                                            placeholder="Cari Wisata..." autocorrect="off" autocomplete="off"
                                            autocapitalize="off">
                                        <div class="mt-3" id="result">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row  justify-content-center mt-3">
                    @yield('caribar')
                </div>
            </div>
    </section>
    <!-- End Hero -->

    @yield('home')

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3><strong>WONDERFULL YOGYAKARTA</strong></h3>
                        @foreach($contact as $item)
                        <p>{{$item->addres}}</p>
                        <p><strong>Phone:</strong> {{$item->no_telp}}</p>
                        <p><strong>Email:</strong> {{$item->email}}</p><br />
                        @endforeach
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/contact">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Team</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="https://www.instagram.com/erfanto_cahyandito/">Erfanto Cahyandito</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="https://www.instagram.com/goesti.rafi/">Gusti Rafi Kurniawan</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="https://www.instagram.com/_rizkynh/">Rizky
                                    Nur Hidayat</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        @foreach($logos as $brand)
                        <img src="/storage/{{ $brand->logo }}" width="95%" alt="">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Triowek</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                @foreach($sosmeds as $sosmed)
                <a href="{{$sosmed->url}}">{!! $sosmed->icon !!}</i></a>
                @endforeach
                <!-- <a href="https://www.facebook.com/profile.php?id=100087764586444" class="facebook"><i
                        class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/wonderfull.yogya/" class="instagram"><i
                        class="bx bxl-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
    <script src="/jquery-3.6.1.js"></script>
    <script>
        $(document).ready(function () {
            $("#wisata").keyup(function () {
                const value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '/cari-nama',
                    data: {
                        'wisata': value
                    },
                    success: function (data) {
                        $('#result').html(data);
                    }
                });

            });
        });
        $(document).ready(function () {
            const categori = $('#categori').val();
            $('#categori').hide();
            $("#wilayah").change(function () {
                const value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '/cari-wilayah',
                    data: {
                        'kategori' : categori,
                        'wilayah': value
                    },
                    success: function (data) {
                        $('#daftarwisata').html(data);
                    }
                });

            });
        });
    </script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>