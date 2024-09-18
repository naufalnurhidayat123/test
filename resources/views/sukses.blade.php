<x-head-admin>
</x-head-admin>
<div>

    <div class="page-body">
        <div class="container-xl d-flex flex-column justify-content-center">
            <div class="empty">
                <div class="empty-img"><img src="{{ asset('static/illustrations/undraw_printing_invoices_5r4r.svg') }}"
                        height="128" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="card">
                        <div class="card-header d-grid justify-content-center">
                            <div class="">
                                {{-- <img src="{{ asset('img/ceklis.png') }}" width="100px" alt=""> --}}
                            </div>
                            <h2 class=""> INVOICE </h2>
                            <p>Pastikan data akun Anda dan produk yang Anda pilih valid dan sesuai.</p>
                        </div>
                        <div class="card-body ">
                            <div class="joki-details bg-white p-3 rounded text-black fw-bold"
                                style="background-color:rgb(255, 255, 255);text-align:left; ">
                                <table class=" w-full">
                                    <tr class="align-items-center">
                                        <td>
                                            <p>PAKET : </p>
                                        </td>

                                        <td>
                                            <p> {{ $data->ambilpaket->rank_awal }}->{{ $data->ambilpaket->rank_akhir }}
                                            </p>
                                        </td>
                                    </tr>

                                    </tr>

                                    <tr>
                                        <td>
                                            <P>NOMOR PESANAN : </P>
                                        </td>
                                        <td>
                                            <p> {{ $data->ambilJoki->nomor_pesanan }}</p>
                                        </td>

                                    </tr>
                                    <tr>

                                        <tr>
                                            <td>
                                                <p>NAMA :</p>
                                            </td>
                                            <td>
                                                <p>{{$data->ambilJoki->nama}}</p>
                                            </td>
                                        </tr>

                                    <tr>
                                        <td>
                                            <p>LOGIN :</p>
                                        </td>
                                        <td>
                                            <p>{{ $data->ambilJoki->login_joki }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <P>USERNAME/EMAIL :</P>
                                        </td>
                                        <td>
                                            <p> {{ $data->ambilJoki->akun_joki }}</p>
                                        </td>
                                    </tr>

                                    <td>
                                        <P>PASSWORD : </P>
                                    </td>
                                    <td>
                                        <p> {{ $data->ambilJoki->password_joki }}</p>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <P>PENJOKI :</P>
                                        </td>
                                        <td>
                                            <p>
                                                @foreach ($dataPenjoki as $item)
                                                    @if ($item->id === $data->ambilJoki->penjoki_id)
                                                        {{ $item->nama_penjoki }}
                                                    @endif
                                                @endforeach
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <P>NO WA :</P>
                                        </td>
                                        <td>
                                            <p> {{ $data->ambilJoki->no_wa }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Price :</p>
                                        </td>
                                        <td>
                                            <p> {{ $data->price }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <P> Pembayaran :</P>
                                        </td>
                                        <td>
                                            <p> {{ $data->status }}</p>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div style="margin-top:1rem;">
                                <p class="empty-title">Pemebayaran Sukses</p>
                                <h4 class="empty-subtitle text-secondary">
                                    Tolong kirim bukti pembayaran ke chat admin, tekan tombol dibawah
                                </h4>
                            </div>
                            <div class="empty-action">
                                @php
                                    $message = urlencode(
                                        "INVOICE:\n" .
                                            "PAKET: {$data->ambilpaket->rank_awal} -> {$data->ambilpaket->rank_akhir}\n" .
                                            "NOMOR PESANAN: {$data->ambilJoki->nomor_pesanan}\n" .
                                            "NAMA: {$data->ambilJoki->nama}\n" .
                                            "LOGIN: {$data->ambilJoki->login_joki}\n" .
                                            "USERNAME/EMAIL: {$data->ambilJoki->akun_joki}\n" .
                                            "PASSWORD: {$data->ambilJoki->password_joki}\n" .
                                            'PENJOKI: ' .
                                            $dataPenjoki->firstWhere('id', $data->ambilJoki->penjoki_id)->nama_penjoki .
                                            "\n" .
                                            "METODE PEMBAYARAN: {$data->ambilJoki->metode_pembayaran}\n" .
                                            "NO WA: {$data->ambilJoki->no_wa}\n" .
                                            "Price: {$data->price}\n" .
                                            "Pembayaran: {$data->status}\n" .
                                            'WAJIB KIRIM BUKTI INVOICE YANG DI WEBSITE!!',
                                    );
                                @endphp
                                <a href="https://wa.me/+6281214448617?text={{ $message }}"
                                    class="btn btn-dark">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-user-dollar">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h3" />
                                        <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                        <path d="M19 21v1m0 -8v1" />
                                    </svg> Chat Admin
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
