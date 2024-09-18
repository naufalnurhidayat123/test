<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/data.css') }}" />

    <!-- ===== FontAwesome ===== -->
    <link href="{{ asset('assets/icon/css/all.css') }}" rel="stylesheet">

    <!-- ===== Bootstrap ===== -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <title>Pembayaran - PAYY STORE</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .header {
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .header h1 {
            color: white;
            font-size: 3rem;
            margin: 0;
        }

        .header p {
            color: white;
            font-size: 1.2rem;
        }

        .container {
            padding: 20px;
        }

        .order-details,
        .joki-details,
        .contact-section,
        .qr-section {
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .order-details h3,
        .joki-details h3,
        .qr-section h3 {
            margin-top: 0;
        }

        .order-details table,
        .joki-details table {
            width: 100%;
            margin-bottom: 0;
        }

        .order-details td,
        .joki-details td {
            padding: 5px;
        }

        .contact-section {
            text-align: center;
        }

        .contact-section button {
            margin-top: 10px;
        }

        .qr-section {
            text-align: center;
        }

        .qr-section img {
            width: 100%;
            max-width: 200px;
            margin-bottom: 20px;
        }

        .qr-section button {
            width: 100%;
            margin-bottom: 20px;
        }

        .main {
            background-color: #f8f9fa;
        }

        .banner-img {
            width: 100%;
            max-width: 130%;
            height: auto;
            margin-bottom: 20px;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <!--===== HEADER =====-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand fs-6" href="<?php echo URL::to('/'); ?>">PAYY STORE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fs-6" href="<?php echo URL::to('/ '); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6" href="<?php echo URL::to('/about'); ?>">About Us</a>
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


    <!-- Header Section -->
    <main class="main">
        <section class="home" id="home">
            <div class="container text-center">
                <img src="{{ asset('assets/img/banner/4.png') }}" alt="Banner" class="banner-img">
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
        <main class="container">
            <div class="row">
                <div class="col-md-4">
                    <!-- QR Code Section -->
                    <div class="qr-section">
                        <h3>LAKUKAN PEMBAYARAN</h3>
                        <button type="button" id="pay-button" class="btn btn-dark">Lanjutkan Pembayaran</button>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Order Details Section -->
                    <div class="order-details">
                        <h3>Order Details</h3>
                        <table class="table table-bordered">
                            <tr>
                                <td>TANGGAL PEMBELIAN</td>
                                <td>NOMOR PESANAN</td>
                            </tr>
                            <tr>
                                <td>{{ $dataJoki->created_at->format('d M Y') }}</td>
                                <td>{{ $dataJoki->nomor_pesanan }}</td>
                            </tr>
                        </table>
                    </div>

                    <!-- Joki Details Section -->
                    <div class="joki-details">
                        <h3>JOKI {{ $dataJoki->category->nama_category }}</h3>
                        <table style="width:500px;">
                            <tr>
                                <td>
                                    <p>RANK</p>
                                </td>
                                <td>
                                    <p>: {{ $dataJoki->paketJoki->rank_awal }} =>
                                        {{ $dataJoki->paketJoki->rank_akhir }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>NAMA</p>
                                </td>
                                <td>
                                    <p>: {{ $dataJoki->nama}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>PERSPECTIVE</p>
                                </td>
                                <td>
                                    <p>: {{ $dataJoki->perspective }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>LOGIN</p>
                                </td>
                                <td>
                                    <p>: {{ $dataJoki->login_joki }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>USERNAME</p>
                                </td>
                                <td>
                                    <p>: {{ $dataJoki->akun_joki }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>PASSWORD</p>
                                </td>
                                <td>
                                    <p>: {{ $dataJoki->password_joki }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>PENJOKI</p>
                                </td>
                                <td>
                                    <p>: {{ $dataJoki->penjoki->nama_penjoki }}</p>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <P>TOTAL PEMBAYARAN Rp. {{ $dataJoki->paketJoki->harga }}</P>

                    </div>

                    <!-- Contact Section -->
                    <div class="contact-section">
                        <h3>TERJADI MASALAH?</h3>
                        <p>Hubungi customer service kami untuk mengatasi masalah</p>
                        <a href="https://wa.me/081214448617"><button type="button" class="btn btn-dark">KONTAK
                                KAMI</button></a>
                    </div>
                </div>
            </div>
        </main>

        <!--===== FOOTER =====-->
        <footer class="pt-5 pb-4">
            <div class="container text-md-left">
                <div class="footer-top row text-md-left">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="mb-4 footer_title">JOKI STORE</h5>
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
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-7nXjY1ypVPHBlSES">
        </script>
        <script src="{{ asset('assets/js/homeHeader.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function() {
                snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content');
                        const xhr = new XMLHttpRequest();
                        xhr.open("POST", "/sukses", true);
                        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                        xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);

                        let data = {
                            id_invoice: "{{ $id_invoice }}"
                        };

                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                // Tampilkan modal loading segera setelah respons diterima
                                var loadingModal = new bootstrap.Modal(document.getElementById(
                                    'loadingModal'), {
                                    backdrop: 'static',
                                    keyboard: false
                                });

                                loadingModal.show();

                                // Perbarui tampilan setelah modal muncul
                                setTimeout(function() {
                                    let response = JSON.parse(xhr.responseText);
                                    let newUrl = response.url + '/' + response.token;
                                    window.location.replace(newUrl);
                                }, 1000);
                            }
                        };

                        xhr.send(JSON.stringify(data));
                    },
                    onPending: function(result) {
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    onError: function(result) {
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            };
        </script>
</body>

</html>
