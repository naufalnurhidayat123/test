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

    <!-- ===== FontAwesome ===== -->
    <link href="assets/icon/css/all.css" rel="stylesheet">

    <!-- ===== Bootstrap ===== -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

    <title>Pembayaran - PAYY STORE</title>

    <style>
        .payment-methods img {
            width: 100px; /* Set a uniform width for all payment logos */
            margin-right: 10px;
        }

        .payment-methods label {
            cursor: pointer;
            display: inline-block;
            margin: 10px 0;
        }
        .invoice-section {
            margin: 20px auto;
            padding: 20px;
            width: 80%;
            max-width: 800px;
            border: 1px solid #000;
        }

        .invoice-section p {
            margin: 5px 0;
        }

        .invoice-section h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .contact-section {
            text-align: center;
            margin: 20px 0;
        }

        .contact-section button {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .contact-section button:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <!-- Main Section -->
    <main class="main">
        <section class="home" id="home">
            <div class="container text-center">
                <img src="assets/img/banner/banner pay store.png" alt="Banner" class="banner-img">
            </div>
        </section>

        {{-- <section class="requirements" id="requirements">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="requirements-box">
                            <h3 class="requirements-title">PERSYARATAN</h3>
                            <p class="requirements-content"><strong>PEMBELI:</strong><br>
                                Wajib adanya masa penawar diskon (tidak login)<br>
                                (Jika sudah login saat hendak menyerang, joki diharap cancel)
                                3 akun login tidak di reset
                            </p>
                            <p class="requirements-content"><strong>PENJOKI:</strong><br>
                                Kami jamin menjaga privasi anda aman<br>
                                Joki bertanggung jawab sepenuhnya jika ada hal yang tidak diharapkan
                                (seperti reset joki dan ban sementara)
                                Akan selesai pada waktu yang telah dijanjikan
                                Anda bisa bertanya pada admin penjelasan kami akan sangat bersungguh sungguh
                                bertanggung jawab
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="data-entry-box">
                            <h3 class="data-entry-title">MASUKAN DATA</h3>
                            <form>
                                <div class="mb-3">
                                    <select class="form-select" id="loginMethod">
                                        <option selected>Pilih login</option>
                                        <option value="1">Twitter</option>
                                        <option value="2">Facebook</option>
                                        <option value="3">login mail pubg</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="username" placeholder="username/no hp/email">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" id="password" placeholder="password">
                                </div>
                                
                            </form>
                        </div>
                        <div class="complete-payment-box">
                            <h3 class="complete-payment-title">SELESAIKAN PEMBAYARAN</h3>
                            <p class="complete-payment-content"></p>
                            <div class="form-group">
                                <label for="paymentMethod">Pilih Metode Pembayaran:</label>
                                <div class="payment-methods">
                                    <label>
                                        <input type="radio" name="paymentMethod" value="gopay">
                                        <img class="gopay" src="assets/img/payment/gopay.png" alt="GoPay">
                                    </label>
                                    <label>
                                        <input type="radio" name="paymentMethod" value="dana">
                                        <img class="dana" src="assets/img/payment/dana.png" alt="Dana">
                                    </label>
                                    <label>
                                        <input type="radio" name="paymentMethod" value="qris">
                                        <img class="qris" src="assets/img/payment/qris.jpg" alt="QRIS">
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control" id="no_hp" placeholder="NO WhatsApp">
                            </div>
                            <a href="/detail_order"><button type="submit" class="btn btn-primary">Lanjutkan Pembayaran</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Invoice Section -->
        <section class="invoice-section" id="invoice">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>INVOICE</h2>
                        <div class="invoice-details">
                            <p><strong>TANGGAL PEMBELIAN:</strong> 17-07-2024</p>
                            <p><strong>NOMOR PESANAN:</strong> NKSHFKK38IN</p>
                            <p><strong>METODE PEMBAYARAN:</strong> QRIS</p>
                        </div>

                        <div class="order-details">
                            <h3>JOKI PAKET A</h3>
                            <p><strong>DETAIL</strong></p>
                            <p>JOKI: GOLD > PLATINUM KD 5</p>
                            <p>LOGIN: FACEBOOK</p>
                            <p>USERNAME/EMAIL: ZKAU@gmail.com</p>
                            <p>PASSWORD: zkau112</p>
                            <p>PENJOKI: xRyujin</p>
                            <p><strong>TOTAL PEMBAYARAN:</strong> Rp. 20.000</p>
                        </div>

                        <div class="contact-section">
                            <h3>TERJADI MASALAH?</h3>
                            <p>Hubungi customer service kami untuk mengatasi masalah</p>
                            <button class="btn btn-dark">KONTAK KAMI</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p>&copy; 2024 Naufal</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="assets/js/homeHeader.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
