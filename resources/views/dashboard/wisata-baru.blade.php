@extends('layouts.dashboard')
@section('dashboard')
<!-- <div class="table-responsive"> -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<table id="table_id" class="table table-hover">
    <thead class="bg-primary">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($wisatas as $wisata)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$wisata->nama}}</td>
            <td>{{$wisata->categori->nama}}</td>
            <td>
                <a type="button" class="badge bg-primary text-decoration-none" data-bs-toggle="modal"
                    data-bs-target="#{{$wisata->slug}}">
                    Detail
                </a>
                <form action="/dashboard/wisata-baru/{{$wisata->id}}" method="post" class="d-inline">
                    @csrf
                    <button type="submit" class="badge bg-success border-0">Acc</button>
                </form>
                <form action="/dashboard/wisata-baru/{{$wisata->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="badge bg-danger border-0"
                        onclick="return confirm('Are you sure delete this data?')"><i
                            class="bi bi-trash">delete</i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- </div> -->
@foreach($wisatas as $wisata)
<!-- modea detail data -->
<div class="modal fade" id="{{$wisata->slug}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Wisata</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>{{$wisata->nama}}</h3>
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
                <ul class="nav nav-pills my-3 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-overview{{$wisata->id}}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-overview{{$wisata->id}}" type="button" role="tab"
                            aria-controls="pills-overview{{$wisata->id}}" aria-selected="true">Overview</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-lokasi{{$wisata->id}}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-lokasi{{$wisata->id}}" type="button" role="tab"
                            aria-controls="pills-lokasi{{$wisata->id}}" aria-selected="false">Lokasi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-rute{{$wisata->id}}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-rute{{$wisata->id}}" type="button" role="tab"
                            aria-controls="pills-rute{{$wisata->id}}" aria-selected="false">Rute</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-harga-tiket{{$wisata->id}}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-harga-tiket{{$wisata->id}}" type="button" role="tab"
                            aria-controls="pills-" aria-selected="false">Harga Tiket</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-fasilitas{{$wisata->id}}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-fasilitas{{$wisata->id}}" type="button" role="tab"
                            aria-controls="pills-" aria-selected="false">Fasilitas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-jam_buka{{$wisata->id}}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-jam_buka{{$wisata->id}}" type="button" role="tab"
                            aria-controls="pills-" aria-selected="false">Jam Buka</button>
                    </li>
                </ul>
                <div class="tab-content text-black" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-overview{{$wisata->id}}" role="tabpanel"
                        aria-labelledby="pills-overview{{$wisata->id}}-tab" tabindex="0">
                        {!! $wisata->deskripsi !!}
                    </div>
                    <div class="tab-pane fade" id="pills-lokasi{{$wisata->id}}" role="tabpanel"
                        aria-labelledby="pills-lokasi{{$wisata->id}}-tab" tabindex="0">{!! $wisata->maps !!}</div>
                    <div class="tab-pane fade" id="pills-rute{{$wisata->id}}" role="tabpanel"
                        aria-labelledby="pills-rute{{$wisata->id}}-tab" tabindex="0">{!!$wisata->rute!!}</div>
                    <div class="tab-pane fade" id="pills-harga-tiket{{$wisata->id}}" role="tabpanel"
                        aria-labelledby="pills-harga-tiket{{$wisata->id}}-tab" tabindex="0">{{$wisata->tiket_price}}
                    </div>
                    <div class="tab-pane fade" id="pills-fasilitas{{$wisata->id}}" role="tabpanel"
                        aria-labelledby="pills-fasilitas{{$wisata->id}}-tab" tabindex="0">{!!$wisata->fasilitas!!}</div>
                    <div class="tab-pane fade" id="pills-jam_buka{{$wisata->id}}" role="tabpanel"
                        aria-labelledby="pills-jam_buka{{$wisata->id}}-tab" tabindex="0">{!!$wisata->jam_buka!!}</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
<!-- akhir modal detail -->
@endforeach


<script type="text/javascript">
$('#categori').on('change', function() {
    $value = $(this).val();
    $.ajax({
        type: 'get',
        url: '/dashboard/wisata',
        data: {
            'categori': $value
        },
        success: function(data) {
            $('tbody').html(data);
        }
    });
})
</script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'csrftoken': '{{ csrf_token() }}'
    }
});
</script>
@endsection