<x-head-admin />
<x-header-admin />
<main class="my-3 my-md-5">
    <div class="container">
        <div class="">
            <a href="{{ route('admin.paketjoki.create') }}" class=""><button class="btn btn-primary mb-4"
                    type="button">+ Tambah Paket</button></a>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Data Paket Joki</h3>
                <form action="{{ route('admin.searchPaketjoki') }}" method="post">
                    @csrf
                    <input type="text" class="form-control" name="key" placeholder="Search...">
                </form>
            </div>
            <div class="card-table table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Foto Paket</th>
                            <th>Category Paket</th>
                            <th>Harga Paket</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}" alt="Post Image"
                                            style="max-height: 50px;">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>{{ $category->nama_category }}</td>
                                <td>
                                    @foreach ($paketjokis->where('categories_id', $category->id) as $paket)
                                        {{ $paket->rank_awal }} - {{ $paket->rank_akhir }} (Rp.
                                        {{ $paket->harga }})<br>
                                    @endforeach
                                </td>
                                <td>
                                    <!-- Tombol aksi dapat ditambahkan di sini -->
                                    <a href="{{ route('admin.paketjoki.detail', $category->id) }}" class=""
                                        style="margin-right: 20px;">
                                        <button class="btn text-primary"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-info-circle">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                <path d="M12 9h.01" />
                                                <path d="M11 12h1v4h1" />
                                            </svg> Detail
                                        </button>
                                    </a>
                                    <a href="deleteData"
                                        onclick="return confirm('Apakah anda yakin ingin ingin menghapus data?')"
                                        class="text-danger btn"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg> Delete</a>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                <div class="d-flex">
                                    <div>
                                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                            <path d="M12 8v4" />
                                            <path d="M12 16h.01" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="alert-title">Anda belum memiliki data paket joki</h4>
                                        <div class="text-secondary">Tambahkan sekarang!!</div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<x-footer-admin></x-footer-admin>
</body>

</html>
