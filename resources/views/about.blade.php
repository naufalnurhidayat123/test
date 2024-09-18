<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | Payy Joki</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
    <link href="assets/icon/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
     <!--===== HEADER =====-->
     <nav class="bg-drak navbar fixed-top navbar-expand-lg navbar-light" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand fs-3" href="./">PAYY STORE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fs-6" href="<?php echo URL::to('/'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6" href="<?php echo URL::to('/about')?>">About Us</a>
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
    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1>PAYY STORE</h1>
                <nav>
                    <ul class="nav">
                        <li class="nav-item"><a href="<?php echo URL::to('/'); ?>" class="nav-link text-white">Home</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section id="showcase" class="bg-dark text-white text-center py-5">
        <div class="container">
            <h1>Selamat Datang di Payy Store</h1>
            <p>Joki rank & Joki KD</p>
        </div>
    </section>

    <section class="container my-5">
        <h2>Tentang Payy Store</h2>
        <p>Payy Store, adalah penyedia layanan jasa joki pubg mobile dengan paket joki yang murah dan pengerjaannya cepat</p>

        <h3>Siapa Kami</h3>
        <p>Payy Store dibuat dengan visi untuk menjadi tujuan utama bagi para penggemar PUBG Mobile. Memudahkan bagi para player pubg mobile yang mencari jasa joki yang mudah di akses dan harga murah </p>

        <h3>Layanan Kami</h3>
        <p>Di Payy Joki, kami menawarkan layanan: </p>
        <ul>
            <li><strong>Joki</strong>: Joki dengan paket-paket joki yang kami sediakan dengan harga murah dan proses pengerjaan cepat dan aman.</li>
        </ul>

        <h3>Benefit?</h3>
        <p>Kami menyediakan benefit:</p>
        <ul>
            <li><strong>Terpercaya dan Aman</strong>: Keamanan Anda adalah prioritas kami. Kami memastikan transaksi yang aman dan menjaga kerahasiaan yang ketat.</li>
            <li><strong>Kepuasan Pelanggan</strong>: Kami berusaha memberikan layanan dan dukungan pelanggan yang luar biasa, memastikan Anda memiliki pengalaman yang lancar.</li>
            <li><strong>Harga Kompetitif</strong>: Dapatkan nilai terbaik untuk uang Anda dengan harga terjangkau kami.</li>
            <li><strong>Tim Ahli</strong>: Manfaatkan keahlian dari tim kami yang berpengetahuan dan bersemangat.</li>
            <li><strong>Video Gameplay</strong>: kami pasti akan membuat video gameplay saat kami melakukan proses joki, kepercayaan pelanggan adalah prioritas kami jadi kami akan membuat video gameplay setelah selesai penjokian</li>
            <li><strong>refund</strong>: jika proses penjokian kami lebih dari 7 hari kami akan mengembalikan uang anda kembali. </li>
        </ul>

        <h3>Persyaratan</h3>
        <p>pelanggan:</p>
        <ul>
            <li><strong>1.</strong>Dilarang untuk login ke akun yang sedang di joki, jika anda meloginkan akun yang sedang di joki tanpa info kami anggap penjokian batal</li>
            <li><strong>2.</strong>akun tidak akan di joki jika belum melakukan payment</li>
            <li><strong>3.</strong>joki sesuai dengan rank pubg mobile anda.</li>
            <li><strong>4.</strong>selalu konfirmasi ke penjoki saat anda ingin melakulan login ke akun anda.</li>
            <li><strong>5.</strong>pastikan anda login dengan format yang benar</li>
        </ul>

        <h3>Hubungi Kami</h3>
        <p>Punya pertanyaan atau butuh bantuan? Tim dukungan kami siap membantu! Hubungi kami di:</p>
        <ul>
            <li><strong>Email</strong>: xpayy05@gmail.com</li>
            <li><strong>Telepon</strong>: 0812-1444-8617</li>
        </ul>
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
                        <a href="<?php echo URL::to('/about')?>" class="footer_link">About Us</a>
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
                    <p class="footer_description">&copy; <script>document.write(new Date().getFullYear())</script> Naufal</p>
                </div>
        </div>
    </footer>

    <!--===== JavaScript =====-->
    <script src="assets/js/homeHeader.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
