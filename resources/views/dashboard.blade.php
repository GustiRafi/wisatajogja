@extends('layouts.dashboard')
@section('dashboard')
<div class="row row-cols-1 row-cols-lg-3">
    <div class="col">
        <div class="card rounded-5 bg-success text-white">
            <div class="px-3 py-5">
                <div class="row row-cols-2">
                    <div class="col-8">
                        <h3>{{ count($wisata) }}</h3>
                        <h5><strong> Jumlah tempat wisata</strong></h5>
                    </div>
                    <div class="col-4">
                        <h1><i class="bi bi-list-stars"></i></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card rounded-5 bg-primary text-white">
            <div class="px-3 py-5">
                <div class="row row-cols-2">
                    <div class="col-8">
                        <h3>{{ count($kategori) }}</h3>
                        <h5><strong> Jumlah Kategori Wisata</strong></h5>
                    </div>
                    <div class="col-4">
                        <h1><i class="bi bi-bookmark-fill"></i></i></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card rounded-5 bg-warning text-white">
            <div class="px-3 py-5">
                <div class="row row-cols-2">
                    <div class="col-8">
                        <h3>{{ count($komen) }}</h3>
                        <h5><strong> Jumlah Komentar</strong></h5>
                    </div>
                    <div class="col-4">
                        <h1><i class="bi bi-chat-fill"></i></i></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection