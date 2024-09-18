<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Penjoki</title>

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.css') }}" />

    <!-- ===== FontAwesome ===== -->
    <link href="{{ asset('assets/icon/css/all.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap JS Bundle (Popper.js included) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


    <!-- ===== Bootstrap ===== -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <style>
        .card-custom {

            width: 18rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            background-color: #fff;
            color: #000;
            text-decoration: none;
            /* ubah warna tex */
        }

        .card-custom img {
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .card-custom:hover {
            transform: scale(1.05);
        }

        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }

        body {
            background-color: #f8f9fa;
        }

        .square-modal {
        width: 300px; /* Lebar kotak */
        height: 300px; /* Tinggi kotak */
        max-width: 100%; /* Agar tidak melebihi lebar layar */
        max-height: 100%; /* Agar tidak melebihi tinggi layar */
        margin: auto; /* Center modal secara horizontal */
    }

    .modal-body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: calc(100% - 100px); /* Sesuaikan dengan tinggi header dan footer */
    }

    .modal-footer {
        display: flex;
        justify-content: center;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand fs-3" href="{{ url('/') }}">PAYY STORE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fs-6" href="<?php echo URL::to('/'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6" href="{{ url('/about') }}">About Us</a>
                    </li>
                </ul>
                <!-- Add Daftar and Login Icons -->
                {{-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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
                </ul> --}}
            </div>
        </div>
    </nav>

    <!-- Main Content -->
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

    <div class="container mt-5 pt-5">
        <h1 class="text-center my-4">PILIH PENJOKI</h1>
        <div class="d-flex flex-wrap justify-content-center">
            @foreach ($penjoki as $joki)
                <form action="{{ route('joki.postPenjoki') }}" class="addDataForm" method="POST">
                    @csrf
                    <button type="submit" class="col-md-3 btn btn-link mx-2 my-2 text-decoration-none">
                        <div class="card card-custom text-center">
                            <input type="hidden" name="id_joki" value="{{ $joki->id }}">
                            <img src="{{ asset('storage/' . $joki->image) }}" class="card-img-top mx-auto mt-4"
                                style="width: 100px; height: 100px;" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{ $joki->nama_penjoki }}</h5>
                                <p class="card-text">Achievement:</p>
                                <p class="card-text">{{ $joki->achievemnt_penjoki }}</p>
                                <p class="card-text">{{ $joki->rank_penjoki }}</p>
                                <p class="card-text">K/D {{ $joki->kd_penjoki }}</p>
                                <p class="card-text">{{ $joki->match_penjoki }} MATCH</p>
                            </div>
                        </div>
                    </button>
                </form>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            <a class="BackButton">
                <button class="BackButton bg-black p-2 text-white rounded fs-5">Kembali</button>
            </a>
        </div>
    </div>


<!-- Modal Konfirmasi -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
            <div class="modal-header bg-dark text-white" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body fs-5">
                Apakah Anda yakin ingin memilih penjoki ini?
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-dark" id="confirmBtn">Ya, Pilih</button>
            </div>
        </div>
    </div>
</div>



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

    <!-- Bootstrap JS and dependencies -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/homeHeader.js') }}"></script>
    <script>
        $(document).ready(function() {
            var formToSubmit;

            $('.addDataForm').on('submit', function(event) {
                event.preventDefault(); // Mencegah form dari pengiriman langsung

                formToSubmit = $(this);
                var confirmModal = new bootstrap.Modal($('#confirmModal')[0]);
                confirmModal.show();
            });

            $('#confirmBtn').on('click', function() {
                var loadingModal = new bootstrap.Modal($('#loadingModal')[0], {
                    backdrop: 'static',
                    keyboard: false
                });
                loadingModal.show();

                $.ajax({
                    url: formToSubmit.attr('action'),
                    method: "POST",
                    data: formToSubmit.serialize(),
                    success: function(res) {
                        setTimeout(function() {
                            window.location.replace(res);
                        }, 1000);
                    }
                });

                var confirmModal = bootstrap.Modal.getInstance($('#confirmModal')[0]);
                confirmModal.hide();
            });

            $('.BackButton').click(function() {
                var loadingModal = new bootstrap.Modal($('#loadingModal')[0], {
                    backdrop: 'static',
                    keyboard: false
                });
                loadingModal.show();
                $.ajax({
                    url: "/back/paket",
                    method: "get",
                    success: function(res) {
                        window.location.replace(res)
                    }
                });
            });
        });
    </script>


</body>

</html>
