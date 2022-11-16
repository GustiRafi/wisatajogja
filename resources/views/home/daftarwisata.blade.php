@extends('layouts.home')
@section('caribar')
<div class="col-6">
    <div class="float-end ms-5">
        <select class="form-select" aria-label="Default select example" id="kategori">
            <option selected>Kategori</option>
            @foreach($categoris as $categori)
            @if($categori->id === $kategori)
            <option value="{{$categori->slug}}" selected>{{$categori->nama}}</option>
            @else
            <option value="{{$categori->slug}}">{{$categori->nama}}</option>
            @endif
            @endforeach
        </select>
    </div>
</div>
<div class="col-6">
    <div class="float-start me-5">
        <select class="form-select" aria-label="Default select example" id="wilayah">
            <option selected>Wilayah</option>
            <option velue="Kab.yogyakarta">Yogyakarta</option>
            <option velue="Kab.bantul">Bantul</option>
            <option velue="Kab.sleman">Sleman</option>
            <option velue="Kab.gunung kidul">Gunung Kidul</option>
            <option velue="Kab.kulon progo">Kulon Progo</option>
        </select>
    </div>
</div>
@endsection
@section('home')
<main id="main">
    <!-- ======= Why Us Section ======= -->
    <input type="text" name="categori" id="categori" value="{{ $kategori }}">
    <section id="why-us" class="why-us">
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 100px;">
                <div class="col-lg-10 col-md-6 col-sm-10 d-flex align-items-stretch">
                    <div class="content shadow">
                        <div class="row justify-content-center" id="daftarwisata">
                            @foreach($wisatas as $wisata)
                            <div class="col-lg-4 col-md-5 col-sm-10 p-3">
                                <a href="/detail-wisata/{{$wisata->slug}}">
                                    <div class="mb-3">
                                            @php
                                            foreach(explode(',', $wisata->image) as $img){
                                                $image = "<img src='".$img."'class='w-100 img-fluid' alt='' srcset=''>";
                                            }
                                            @endphp
                                            {!! $image !!}
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
</main>
@endsection