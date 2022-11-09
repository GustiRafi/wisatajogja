<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Request to Wonderfull Yogya Team</title>
</head>

<body>
    <div class="row row-cols-1 justify-content-center">
        <div class="col-6">
            @foreach($logo as $brand)
            <img src="/storage/{{ $brand->logo }}" class="img-fluid" alt="">
            @endforeach
        </div>
    </div>
    <h2>Hallo Wonderfull Yogyakarta Team</h2>
    <br>
    <p>You received an email from : {{ $name }} </p>
    <br><br>
    <p>User details: </p>
    <ul>
        <li>Name: {{ $name }}</li>
        <li>Email: <a href="mailto:{{ $email }}" class="text-decoration-none">{{ $email }}</a></li>
    </ul>
    <br>
    <p>I have request for this website.The request is {!! $request !!}</p>

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