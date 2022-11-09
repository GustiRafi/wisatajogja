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
                            <h3 class="card-title m-4 text-black"><strong>Contact</strong></h3>
                            <h4 class="text-black">Halo Sahabat Wonderful Yogyakarta, kami dapat dihubungi melalui
                                kontak di bawah ini. Silahkan menghubungi kami jika ada request, pertanyaan, maupun
                                saran karena kami akan dengan senang hati meresponnya.</h4>
                            <!-- Swiper -->

                        </div>
                        @foreach($contact as $item)
                        <h5 class="text-black mt-5"><strong> No. Telepon / Whatsapp</strong></h5>
                        <a href="https://wa.me/{{$item->no_telp}}">
                            <h5 class="text-black">{{$item->no_telp}}</h5>
                        </a>
                        <h5 class="text-black mt-5"><strong>Email</strong></h5>
                        <a href="mailto:{{$item->email}}">
                            <h5 class="text-black">{{$item->email}}</h5>
                        </a>
                        <h5 class="text-black mt-5"><strong>Alamat</strong></h5>
                        <h5 class="text-black">{{$item->addres}}</h5>
                        @endforeach
                        <h4 class="text-black text-center mt-5"> <strong>Bagaimana kami bisa membantu?</strong></h4>
                        <h5 class="text-black text-center">Apabila anda memiliki request, pertanyaan, maupun saran
                            silahkan isi kotak pesan di bawah ini.</h5>
                        <div class="container">

                            <form action="/send-request" method="post">
                                @csrf
                                <div class="row justify-content-center mt-5">
                                    <div class="col-md-6 col-12">
                                        <label for="name" class="form-label text-black">Nama</label>
                                        <input type="text" class="form-control" id="name" aria-describedby="namaHelp"
                                            name="name">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="email" class="form-label text-black">Email
                                            address</label>
                                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                            name="email">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="request" class="form-label text-black mt-4">Request /
                                        Saran / Pertanyaan *</label>
                                    <textarea class="form-control" id="request" style="height: 100px"
                                        name="request"></textarea>
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
    'Request Sending Successfully',
    'success'
);
</script>
@endif
@endsection