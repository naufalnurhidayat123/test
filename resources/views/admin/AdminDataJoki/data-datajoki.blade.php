<x-head-admin />
<x-header-admin />

<main class="my-3 my-md-5">
    <div class="container">
        <div class="">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Data Akun Joki</h3>
                    <form action="{{ route('admin.searchDatajoki') }}" method="post">
                        @csrf
                        <input type="text" name="key" placeholder="Search..." id="" class="form-control">
                    </form>
                </div>
                <div class="card-table table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Pesanan</th>
                                <th>Nama</th>
                                <th>Login Joki</th>
                                <th>Mode Joki</th>
                                <th>Akun Joki</th>
                                <th>Password Joki</th>
                                {{-- <th>Metode Pembayaran</th> --}}
                                <th>No Wa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @forelse ($datajoki as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nomor_pesanan }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->login_joki }}</td>
                                <td>{{ $data->mode_joki }}</td>
                                <td>{{ $data->akun_joki }}</td>
                                <td>{{ $data->password_joki }}</td>
                                {{-- <td>{{ $data->metode_pembayaran }}</td> --}}
                                <td>{{ $data->no_wa }}</td>
                                <td class="">
                                    <a class="text-danger btn"
                                        onclick="return confirm('Apakah anda yakin ingin ingin menghapus data?')"
                                        href="{{ route('admin.datajoki.destroy', $data->id) }}">
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
                                        </svg> Delete
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                <div class="d-flex">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M18 6l-12 12" />
                                            <path d="M6 6l12 12" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="alert-title">Belum Ada Data Joki</h4>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </table>
                    {{ $datajoki->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</main>
<x-footer-admin></x-footer-admin>
