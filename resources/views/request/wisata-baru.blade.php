<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h2>Hallo Wonderfull Yogyakarta Team</h2>
    <br>
    <br><br>
    <ul>
        <li>Name: {{ $name }}</li>
        <li>Email: <a href="mailto:{{ $email }}" class="text-decoration-none">{{ $email }}</a></li>
    </ul>
    <br>
    <p>Saya ingin menginformasikan bahwa saya baru saja mengirimkan informasi destinasi wisata baru.Berikut informasi yang saya berikan:</p>
    <p>Nama Wisata : {{ $wisata_nama }}</p>
    <p>Alamat : {!! $wisata_addres !!}</p>
    <p>Rute : {!! $wisata_rute !!}</p>
    <p>Fasilitas : {!! $wisata_fasilitas !!}</p>
    <p>Harga Tiket : {!! $wisata_tiket_price !!}</p>
    <p>Jam Buka : {!! $wisata_jam_buka !!}</p>
    <p>Deskripsi Wisata : {!! $wisata_deskripsi !!}</p>

    <br><br>

    <p>Thanks</p>
    <p>{{ $name }}</p>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>