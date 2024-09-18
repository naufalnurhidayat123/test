<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />

    <!-- ===== FontAwesome ===== -->
    <link href="assets/icon/css/all.css" rel="stylesheet">

    <!-- ===== Bootstrap ===== -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <title>JOKI STORE</title>
</head>

<body>
<!--===== HEADER =====-->
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand fs-5" href="./">PAYY STORE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active fs-5" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="{{ route('joki.about') }}">About Us</a>
                </li>
            </ul>
            <!-- Add Daftar, Login, and List Pembelian Icons -->
            {{-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fs-6" href="/list-pembelian">
                        <i class="fas fa-shopping-cart"></i> List Pembelian
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6" href="/register">
                        <i class="fas fa-user-plus"></i> Daftar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6" href="/login">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
            </ul>   --}}
        </div>
    </div>
</nav>

    <main class="main">
        <!--===== HOME =====-->
        <section class="home" id="home">
            @session('warning')
                <div class="alert alert-danger mb-5 text-center">{{ session('warning') }}</div>
            @endsession
            <div class="home_container bd-grid">
                <div class="home_product d-flex justify-content-center align-items-center">
                    <div class="home_shape"></div>
                    <img src="assets/img/karakter/angel.PNG" alt="products" class="home_img" />
                </div>

                <div class="home_data">
                    <span class="home_new">PUBG MOBILE</span>
                    <h1 class="home_title">
                        TURUN RANK TERUS? <br />
                        JOKI AJA SINI!
                    </h1>
                    <p class="home_description">AMAN CEPAT DAN MURAH</p>
                    <a href="#category" class="button">JOKI SEKARANG!</a>
                </div>
            </div>
        </section>

        <!--===== Category PUBG =====-->
        <section class="category pubg" id="category">
            <h2 class="section-title">PUBG MOBILE</h2>
            <div class="modal fade" id="loadingModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content text-center">
                        <div class="modal-body">
                            <div class="spinner-border text-dark" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-3">Please wait...</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-2 ">
                <div class="d-flex flex-wrap gap-4 justify-content-center">
                    @foreach ($categories as $d)
                        <div class="border p-4  rounded col-4 d-flex align-items-center gap-4">
                            <div class="">
                                <form class="addDataForm" action="{{ route('admin.insertKategori') }}" method="POST">
                                    @csrf
                                    <h3 class="category_name">{{ $d->nama_category }}</h3>
                                    <p class="category_description">{{ $d->deskripsi_category }}</p>
                                    <input type="hidden" value="{{ $d->id }}" name="id_kategori">
                                    <button type="submit" class="button-light">lebih lanjut<i
                                            class="fas fa-arrow-right button-icon"></i></button>
                                </form>
                            </div>
                            <div>
                                @if ($d->image)
                                    <img src="{{ asset('storage/' . $d->image) }}" width="200px" alt="category" />
                                @else
                                    <span>No Image</span>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <!--===== FOOTER =====-->
        <footer class="pt-5 pb-4">
            <div class="container text-md-left">
                <div class="footer-top row text-md-left">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="mb-4 footer_title">PAYY STORE</h5>
                        <p>JOKI MURAH AMAN CEPAT</p>
                    </div>
                    <div class="footer-product col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class="mb-4">Products</h5>
                        <p>
                            <a href="#category" class="footer_link">JOKI PUBG MOBILE</a>
                        </p>
                    </div>
                    <div class="footer-link col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class="mb-4">Link</h5>
                        <p>
                            <a href="<?php echo URL::to('/about'); ?>" class="footer_link">About Us</a>
                        </p>
                    </div>
                    <div class="footer-contact col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="mb-4">Contact</h5>
                        <p>
                            <i class='fas fa-phone me-3'> </i> 081214448617
                        </p>
                    </div>
                </div>

                <hr class="mb-4">

                <div class="footer-bottom row align-items-center">
                    <div class="col-sm-12 col-lg-8">
                        <p class="footer_description">&copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Naufal
                        </p>
                    </div>
                </div>
        </footer>

        <!--===== JavaScript =====-->
        <script src="assets/js/homeHeader.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.addDataForm').on('submit', function(event) {
                    event.preventDefault(); // Mencegah form dari pengiriman langsung

                    var loadingModal = new bootstrap.Modal($('#loadingModal')[0], {
                        backdrop: 'static',
                        keyboard: false
                    });
                    loadingModal.show();
                    $.ajax({
                        url: "admin/data-insertJoki",
                        method: "POST",
                        data: $(this).serialize(),
                        success: function(res) {
                            setTimeout(function() {
                                loadingModal.hide();
                                window.location.href = res;
                            }, 1000);
                        }
                    })
                });
            });
        </script>
</body>

</html>
