<x-head-admin />
<x-header-admin />
<div class="my-3 my-md-5">
    <div class="container">
        <form action="{{ route('admin.penjoki.update', $penjoki->id) }}" method="POST" enctype="multipart/form-data"
            class="card">
            <div class="card-header">
                <h3 class="card-title"><strong>Edit Data Penjoki</strong> </h3>
            </div>
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="image" class="form-label">Foto Penjoki</label>
                        <input class="form-control @error('nama_penjoki') is-invalid @enderror" type="file"
                            id="image" name="image">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <p class="mt-4">Preview Sebelumnya : </p>
                        @if ($penjoki->image)
                            <img src="{{ asset('storage/' . $penjoki->image) }}" alt="Post Image" class="mt-2"
                                style="max-height: 200px;">
                        @endif
                    </div>
                    <div class="mb-3 col-6">
                        <label for="" class="form-label">Nama Penjoki</label>
                        <input type="text" class="form-control @error('nama_penjoki') is-invalid @enderror"
                            name="nama_penjoki" placeholder="example : xNaufal" value="{{ $penjoki->nama_penjoki }}">
                        @error('nama_penjoki')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6">
                        <label for="" class="form-label">Achievement Penjoki</label>
                        <input type="text" class="form-control" name="achievement_penjoki"
                            placeholder="example : Pilgub" value="{{ $penjoki->achievement_penjoki }}">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="" class="form-label">Rank Penjoki</label>
                        <input type="text" class="form-control @error('rank_penjoki') is-invalid @enderror"
                            name="rank_penjoki" placeholder="example : Conqueror" value="{{ $penjoki->rank_penjoki }}">
                        @error('rank_penjoki')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-6">
                        <label for="" class="form-label">KD Penjoki</label>
                        <input type="text" class="form-control @error('kd_penjoki') is-invalid @enderror"
                            name="kd_penjoki" placeholder="example : 9.0" value="{{ $penjoki->kd_penjoki }}">
                        @error('kd_penjoki')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Match Penjoki</label>
                        <input type="text" class="form-control @error('match_penjoki') is-invalid @enderror"
                            name="match_penjoki" placeholder="example : 2000" value="{{ $penjoki->match_penjoki }}">
                        @error('match_penjoki')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary my-2">Simpan Data</button>
                <a href="{{ route('admin.penjoki') }}" class=""><button  type="button" class="btn btn-danger">Batal Edit Data</button></a>
            </div>
        </form>
    </div>
</div>

<x-footer-admin />
