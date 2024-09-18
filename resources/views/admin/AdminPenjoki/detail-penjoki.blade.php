<x-head-admin />
<x-header-admin></x-header-admin>

<main class="container my-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">
                    Detail Penjoki
                </h3>
                <div class="d-flex gap-4 justify-content-end">
                    <a href="{{ route('admin.penjoki') }}">
                        <button class="btn text-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-door-exit">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M13 12v.01" />
                                <path d="M3 21h18" />
                                <path d="M5 21v-16a2 2 0 0 1 2 -2h7.5m2.5 10.5v7.5" />
                                <path d="M14 7h7m-3 -3l3 3l-3 3" />
                            </svg>
                            Back
                        </button>
                    </a>
                    {{-- <a href="{{ route('admin.penjoki.edit', $penjoki->id) }}">
                        <button class="btn text-primary">

                            <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                <path d="M16 5l3 3" />
                            </svg>
                            Edit Penjoki
                        </button>
                    </a> --}}
                    <a href="{{ route('admin.penjoki.destroy', $penjoki->id) }}" class="deleteData btn text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 7l16 0" />
                            <path d="M10 11l0 6" />
                            <path d="M14 11l0 6" />
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                        </svg> Delete</a>
                </div>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-5">Foto Penjoki :</dt>
                    <dd class="col-7">
                        @if ($penjoki->image)
                            <img src="{{ asset('storage/' . $penjoki->image) }}" alt="Post Image"
                                style="max-height: 200px;">
                        @else
                            <span>No Image</span>
                        @endif
                    </dd>
                    <dt class="col-5">Nama Penjoki :</dt>
                    <dd class="col-7">{{ $penjoki->nama_penjoki }}</dd>
                    <dt class="col-5">Achievement Penjoki:</dt>
                    <dd class="col-7">{{ $penjoki->achievement_penjoki }}</dd>
                    <dt class="col-5">Rank Penjoki :</dt>
                    <dd class="col-7">{{ $penjoki->rank_penjoki }}</dd>
                    <dt class="col-5">KD Penjoki :</dt>
                    <dd class="col-7">{{ $penjoki->kd_penjoki }}</dd>
                    <dt class="col-5">Match Penjoki :</dt>
                    <dd class="col-7">{{ $penjoki->match_penjoki }}</dd>
                </dl>
            </div>
        </div>
    </div>
</main>

<x-footer-admin></x-footer-admin>
