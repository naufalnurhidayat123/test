<x-head-admin />
<x-header-admin />

<main class="my-3 my-md-5">
    <div class="container">
        <div class="">
            <div class="">
                <a href="{{ route('admin.penjoki.create') }}" class="btn btn-primary mb-4">+ Tambah Penjoki</a>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Data Penjoki</h3>
                    <form action="{{ route('admin.searchPenjoki') }}" method="post">
                        @csrf
                        <input type="text" placeholder="Search..." class="form-control" name="key">
                    </form>
                </div>
                <div class="card-table table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Foto Penjoki</th>
                                <th>Nama Penjoki</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @forelse ($penjoki as $joki)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($joki->image)
                                        <img src="{{ asset('storage/' . $joki->image) }}" alt="Post Image"
                                            style="max-height: 50px; max-width: 50px;">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td class="text-secondary">{{ $joki->nama_penjoki }}</td>
                                <td class="">
                                    {{-- <a class="" href="{{ route('admin.penjoki.edit', $joki->id) }}"
                                        style="margin-right: 20px;">
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
                                    </a> --}}
                                    <a class="" href="{{ route('admin.penjoki.detail', $joki->id) }}"
                                        style="margin-right: 20px;">
                                        <button class="text-primary btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg> Detail
                                        </button>
                                    </a>
                                    <a class="text-danger btn deleteData"
                                        href="{{ route('admin.penjoki.destroy', $joki->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
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
                                        <h4 class="alert-title">Anda belum memiliki data penjoki</h4>
                                        <div class="text-secondary">Tambahkan sekarang!!</div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </table>
                    {{ $penjoki->links('pagination::bootstrap-5') }}

                </div>
            </div>
        </div>
    </div>
</main>
<x-footer-admin></x-footer-admin>
