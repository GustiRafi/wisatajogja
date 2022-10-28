<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wonderful Yogyakarta</title>
    <!-- <meta name="_token" content="{{ csrf_token() }}"> -->
    <link rel="stylesheet" href="/vendors/feather/feather.css">
    <link rel="stylesheet" href="/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/js/select.dataTables.min.css">
    <link rel="stylesheet" href="/css/vertical-layout-light/style.css">
    @foreach($logos as $brand)
    <link rel="shortcut icon" href="/storage/{{ $brand->logo }}" />
    @endforeach
    <link rel="stylesheet" href="/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="/style.css"> -->
    <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('partials.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('partials.setting')
            @include('partials.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('dashboard')
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="/vendors/js/vendor.bundle.base.js"></script>
    <script src="/vendors/chart.js/Chart.min.js"></script>
    <script src="/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/vendors/progressbar.js/progressbar.min.js"></script>

    <script src="/js/off-canvas.js"></script>
    <script src="/js/hoverable-collapse.js"></script>
    <script src="/js/template.js"></script>
    <script src="/js/settings.js"></script>
    <script src="/js/todolist.js"></script>
    <script src="/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="/js/dashboard.js"></script>
    <script src="/js/Chart.roundedBarCharts.js"></script>
    <script src="/trix.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script>
    document.addEventListener("trix-file-accept", event => {
        event.preventDefault()
    })


    document.getElementById("logout").addEventListener("click", function(event) {
        event.preventDefault()
        swal({
                title: "Are you sure to Logout?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'post',
                        url: '/logout',
                        data: {
                            // 'categori': $value
                        },

                    });
                }
            });
    });

    // const title = document.querySelector('#nama');
    // const slug = document.querySelector('#slug');

    // title.addEventListener('change', function() {
    //     fetch('/dashboard/categori/checkslug?nama=' + title.value)
    //         .then(response => response.json())
    //         .then(data => slug.value = data.slug)
    // });

    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
    // function logout_confirm() {
    //     swal({
    //         title: "Are you sure to Logout?",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //     })
    // }
    // jQuery(document).ready(function() {
    //     ImgUpload();
    // });

    // function ImgUpload() {
    //     var imgWrap = "";
    //     var imgArray = [];

    //     $('#image').each(function() {
    //         $(this).on('change', function(e) {
    //             imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
    //             var maxLength = $(this).attr('data-max_length');

    //             var files = e.target.files;
    //             var filesArr = Array.prototype.slice.call(files);
    //             var iterator = 0;
    //             filesArr.forEach(function(f, index) {

    //                 if (!f.type.match('image.*')) {
    //                     return;
    //                 }

    //                 if (imgArray.length > maxLength) {
    //                     return false
    //                 } else {
    //                     var len = 0;
    //                     for (var i = 0; i < imgArray.length; i++) {
    //                         if (imgArray[i] !== undefined) {
    //                             len++;
    //                         }
    //                     }
    //                     if (len > maxLength) {
    //                         return false;
    //                     } else {
    //                         imgArray.push(f);

    //                         var reader = new FileReader();
    //                         reader.onload = function(e) {
    //                             var html =
    //                                 "<div class='upload__img-box'><div style='background-image: url(" +
    //                                 e.target.result + ")' data-number='" + $(
    //                                     ".upload__img-close").length + "' data-file='" + f
    //                                 .name +
    //                                 "' class='img-bg'><div class='upload__img-close'></div></div></div>";
    //                             imgWrap.append(html);
    //                             iterator++;
    //                         }
    //                         reader.readAsDataURL(f);
    //                     }
    //                 }
    //             });
    //         });
    //     });

    //     $('body').on('click', ".upload__img-close", function(e) {
    //         var file = $(this).parent().data("file");
    //         for (var i = 0; i < imgArray.length; i++) {
    //             if (imgArray[i].name === file) {
    //                 imgArray.splice(i, 1);
    //                 break;
    //             }
    //         }
    //         $(this).parent().parent().remove();
    //     });
    // }
    </script>
</body>

</html>