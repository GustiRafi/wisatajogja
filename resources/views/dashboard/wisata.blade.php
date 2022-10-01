@extends('layouts.dashboard')
@section('dashboard')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahwisata">
    Add New Destination
</button>

<!-- Modal -->
<div class="modal fade" id="tambahwisata" tabindex="-1" aria-labelledby="tambahwisataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahwisataLabel">Form Add New Destination</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/wisata" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="name destination">
                        <label for="nama">Destination Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                        <label for="slug">Slug</label>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select category</option>
                            @foreach($categoris as $categori)
                            <option value="{{$categori->id}}">{{$categori->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="addres" name="addres" placeholder="Addres">
                        <label for="addres">Addres</label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Exit</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">nama</th>
                <th scope="col">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wisatas as $wisata)
            <tr class="">
                <td scope="row">{{$wisata->nama}}</td>
                <td>{{$wisata->addres}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection