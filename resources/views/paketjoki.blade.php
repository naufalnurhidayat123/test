div
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/paket_a.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.css') }}" />

    <!-- ===== FontAwesome ===== -->
    <link href="{{ asset('assets/icon/css/all.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <!-- ===== Bootstrap ===== -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <title>Pembayaran - JOKI STORE</title>
    <style>
        .main .package {
            background-color: #D9D9D9;
            color: rgb(0, 0, 0);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            text-decoration: none;
            /* ubah warna tex */
        }


        .main .package-body button {
            background-color: #000000;
            color: hsl(220, 100%, 99%);
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .card-custom {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            text-decoration: none;
            /* ubah warna tex */
        }

        .package img {
            max-width: 100%;
            max-width: 200px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .main .package-header img {
            width: 78px;
            height: auto;
        }

        .banner-img {
            width: 100%;
            max-width: 130%;
            height: auto;
            margin-bottom: 10px;
            margin-top: 42px;
        }
    </style>
</head>

<body>

    <!--===== HEADER =====-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand fs-9" href="./">PAYY STORE</a>
            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fs-6" href="{{ route('joki.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6" href="{{ route('joki.about') }}">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main Section -->
    <main class="main">
        <section class="home" id="home">
            <div class="container text-center w-96">
                <img src="{{ asset('assets/img/banner/rank.png') }}" alt="Banner" class="banner-img">
            </div>
        </section>
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
        <!-- Main Section -->
        <main class="main">
            <div class="container">
                <h2 class="package-title">{{ $categories->nama_category }}</h2>
                <div class="d-flex flex-wrap justify-content-center gap-4">
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($categories->paketjokis as $paketjoki)
                        @php
                            $i++;
                        @endphp
                        <form action="{{ route('joki.postPaket') }}" class="addDataForm" method="POST">
                            @csrf
                            <div class="d-flex border p-3">
                                <div>
                                    <div class="package-header">
                                        <p class="h6">{{ $paketjoki->rank_awal }} ➔ {{ $paketjoki->rank_akhir }}
                                        </p>
                                    </div>
                                    <div class="package-body">
                                        <p>Rp. {{ $paketjoki->harga }}</p>
                                        <input type="hidden" name="idPaket" value="{{ $paketjoki->id }}">
                                        <div>
                                            <button class="btn btn-primary">Order Sekarang
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <img src="{{ asset('storage/' . $paketjoki->image) }}" width="170px"
                                        alt="{{ $paketjoki->rank_awal }} to {{ $paketjoki->rank_akhir }}">
                                </div>
                            </div>
                        </form>
                    @empty
                        <div class=" justify-content-center">
                            <p class="d-block w-full  alert alert-secondary">Maaf Paket Joki untuk kategori ini belum
                                tersedia
                            </p>
                            <div class="d-flex justify-content-center mt-4">
                                <a class="BackButton">
                                    <button class="BackButton btn btn-success">Kembali</button>
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            @if ($i > 1)
                <div class="d-flex justify-content-center mt-4">
                    <a class="BackButton">
                        <button class="BackButton bg-black p-2 text-white rounded fs-5">Kembali</button>
                    </a>
                </div>
            @endif
        </main>
    </main>

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


    <!-- JavaScript -->
    <script src="{{ asset('assets/js/homeHeader.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
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
                    url: "/paket",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(res) {
                        setTimeout(function() {
                            window.location.replace(res);
                        }, 1000);
                    }
                })
            });
            $('.BackButton').click(function() {
                var loadingModal = new bootstrap.Modal($('#loadingModal')[0], {
                    backdrop: 'static',
                    keyboard: false
                });
                loadingModal.show();
                $.ajax({
                    url: "/back/home",
                    method: "get",
                    success: function(res) {
                        window.location.replace(res)
                    }
                })
            });
        });
    </script>
</body>

</html>
