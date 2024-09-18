<x-head-admin />
<x-header-admin />
<main class="my-3 my-md-5">
    <div class="container">
        <a href="{{ route('admin.paketjoki') }}" class=" "><button class="btn btn-danger">Kembali</button></a>
        <br>
        <br>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Paket untuk Kategori: <strong>{{ $categories->nama_category }}</strong>
                </h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Rank Awal</th>
                            <th>Rank Akhir</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paketjoki as $paket)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $paket->rank_awal }}</td>
                                <td>{{ $paket->rank_akhir }}</td>
                                <td>Rp. {{ $paket->harga }}</td>
                                <td>
                                    <a href="{{ route('admin.paketjoki.edit', $paket->id) }}" class="">
                                        <button class="text-success btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg> Edit
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<x-footer-admin></x-footer-admin>
