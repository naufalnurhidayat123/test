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
    <link rel="stylesheet" type="text/css" href="assets/css/data.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />

    <!-- ===== FontAwesome ===== -->
    <link href="assets/icon/css/all.css" rel="stylesheet">

    <!-- ===== Bootstrap ===== -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

    <title>Pembayaran - JOKI STORE</title>

    <style>
        .payment-methods img {
            width: 100px;
            /* Set a uniform width for all payment logos */
            margin-right: 10px;
        }

        .payment-methods label {
            cursor: pointer;
            display: inline-block;
            margin: 10px 0;
        }

        .main {
            background-color: #f8f9fa;
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
            <a class="navbar-brand fs-6" href="./">PAYY STORE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-6 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fs-6" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6" href="{{ url('/about') }}">About Us</a>
                    </li>
                </ul>
                {{-- <!-- Add Daftar and Login Icons -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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

    <!-- Main Section -->
    <main class="main">
        <section class="home" id="home">
            <div class="container text-center">
                <img src="assets/img/banner/4.png" alt="Banner" class="banner-img">
            </div>
        </section>
        <br>
        <section class="requirements" id="requirements">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="requirements-box">
                            <h3 class="requirements-title">PERSYARATAN</h3>
                            <p class="requirements-content"><strong>PEMBELI:</strong><br>
                                *dilarang login saat proses penjokian<br>
                                (jika melakukan login pada saat proses joki di anggap batal)
                            </p>
                            <p>
                                *login dengan format yang tersedia
                            </p>
                            <p class="requirements-content"><strong>PENJOKI:</strong><br>
                                *Kami jamin menjaga privasi anda aman<br>
                                *Jika akun terkena masalah kami akan bertanggung jawab
                            </p>
                            <p>
                                *kami sangat siap bertanggung jawab jika akun anda hilang atau masalah lainnya
                            </p>
                        </div>
                    </div>
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
                    <div class="col-lg-8">
                        <div class="data-entry-box ">
                            <h3 class="data-entry-title">MASUKAN DATA</h3>
                            <br>
                            <form action="{{ route('datajoki.store') }}" method="POST" class="row addDataForm">
                                @csrf
                                <div class="col">
                                    <div class="mb-4">
                                        <div class="form-label text-secondary">Login</div>
                                        <select name="login_joki"
                                            class="form-control @error('login_joki') is-invalid @enderror"
                                            id="">
                                            <option selected disabled class="">Pilih login</option>
                                            <option value="Twitter"
                                                {{ old('login_joki') == 'Twitter' ? 'selected' : '' }}>
                                                Twitter</option>
                                            <option value="Facebook"
                                                {{ old('login_joki') == 'Facebook' ? 'selected' : '' }}>Facebook
                                            </option>
                                            <option value="Login Mail PUBG"
                                                {{ old('login_joki') == 'Login Mail Pubg' ? 'selected' : '' }}>login
                                                mail
                                                pubg</option>
                                        </select>
                                        @error('login_joki')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-label text-secondary">Perspective</div>
                                        <select name="perspective"
                                            class="form-control @error('perspective') is-invalid @enderror"
                                            id="">
                                            <option selected disabled>Perspective</option>
                                            <option value="TPP" {{ old('perspective') == 'TPP' ? 'selected' : '' }}>
                                                TPP
                                            </option>
                                            <option value="FPP" {{ old('perspective') == 'FPP' ? 'selected' : '' }}>
                                                FPP
                                            </option>
                                        </select>
                                        @error('perspective')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-label text-secondary">Nama Anda</div>
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            placeholder="Nama " autocomplete="off" value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4">
                                        <div class="form-label text-secondary">Game Mode</div>
                                        <select name="mode_joki"
                                            class="form-select @error('mode_joki') is-invalid @enderror">
                                            <option selected disabled>Mode</option>
                                            <option value="Solo" {{ old('mode_joki') == 'Solo' ? 'selected' : '' }}>
                                                Solo
                                            </option>
                                            <option value="Duo" {{ old('mode_joki') == 'Duo' ? 'selected' : '' }}>
                                                Duo
                                            </option>
                                            <option value="Squad"
                                                {{ old('mode_joki') == 'Squad' ? 'selected' : '' }}>
                                                Squad</option>
                                        </select>
                                        @error('mode_joki')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-label text-secondary">Data Akun Pubg</div>
                                        <input type="text" name="akun_joki"
                                            class="form-control @error('akun_joki') is-invalid @enderror"
                                            placeholder="username/no hp/email" autocomplete="off"
                                            value="{{ old('akun_joki') }}">
                                        @error('akun_joki')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-label text-secondary">Password Akun Pubg</div>
                                        <div class="input-group">
                                            <input type="password" id="password_joki" name="password_joki"
                                                class="form-control @error('password_joki') is-invalid @enderror"
                                                placeholder="password" autocomplete="off"
                                                value="{{ old('password_joki') }}">
                                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="togglePassword()">
                                                <i id="password-icon" class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        @error('password_joki')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="form-label text-secondary">No WhatsApp Anda</div>
                                    <input type="text" class="form-control @error('no_wa') is-invalid @enderror" placeholder="Gunakan +62"
                                        name="no_wa" placeholder="NO WhatsApp" value="{{ old('no_wa') }}">
                                    @error('no_wa')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class=" ">
                                    <button type="submit" class="btn btn-dark col-12 ">Lanjutkan Ke
                                        Pembayaran</button>
                                </div>
                        </div>
                        </form>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="#" id="backButton">
                            <button class="bg-black p-2 text-white rounded fs-5">Pilih Ulang Penjoki</button>
                        </a>
                    </div>

                </div>
            </div>
        </section>
    </main>


    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg card-style">
                <div class="modal-header bg-dark text-white card-header-style">
                    <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body fs-5">
                    Jika ingin memilih ulang penjoki, data yang Anda masukkan akan terhapus!
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="/penjoki" id="confirmButton" class="btn btn-dark">Ya, Pilih Ulang</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Alert Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Pastikan data yang Anda isi sudah benar.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-dark">Lanjutkan Pembayaran</button>
            </div>
        </div>
    </div>
</div>


    <!-- Alert Konfirmasi Beres Loading -->
    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                <div class="modal-header bg-dark text-white" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <h5 class="modal-title" id="alertModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text fs-5">
                    Pastikan data yang Anda masukkan sudah benar. Apakah Anda ingin cek ulang data atau lanjutkan?
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cek Ulang</button>
                    <button type="button" class="btn btn-dark" id="confirmSubmit">Lanjutkan Pembayaran</button>
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




    <!--===== JavaScript =====-->
    <script src="assets/js/homeHeader.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>




        <script>
            function togglePassword() {
                const passwordField = document.getElementById('password_joki');
                const passwordIcon = document.getElementById('password-icon');

                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    passwordIcon.classList.remove('fa-eye');
                    passwordIcon.classList.add('fa-eye-slash');
                } else {
                    passwordField.type = 'password';
                    passwordIcon.classList.remove('fa-eye-slash');
                    passwordIcon.classList.add('fa-eye');
                }
            }


            $(document).ready(function() {
        $('#backButton').click(function(event) {
            event.preventDefault(); // Mencegah link default

            // Tampilkan modal konfirmasi
            var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            confirmationModal.show();
        });
    });














        $(document).ready(function() {
            $('.addDataForm').on('submit', function(event) {
        event.preventDefault(); // Mencegah submit form langsung

        var loadingModal = new bootstrap.Modal($('#loadingModal')[0], {
            backdrop: 'static',
            keyboard: false
        });
        loadingModal.show(); // Menampilkan modal loading

        // Simulasi loading selama 2 detik
        setTimeout(() => {
            loadingModal.hide(); // Sembunyikan modal loading

            // Tampilkan alert modal konfirmasi setelah loading selesai
            var alertModal = new bootstrap.Modal($('#alertModal')[0]);
            alertModal.show();
        }, 2000);
    });

    // Ketika tombol "Lanjutkan Pembayaran" di modal diklik
    $('#confirmSubmit').click(function() {
        $('.addDataForm')[0].submit(); // Lanjutkan submit form
    });
});
    </script>
</body>

</html>
