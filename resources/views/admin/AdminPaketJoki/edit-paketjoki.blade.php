<x-head-admin />
<x-header-admin />
<div class="my-3 my-md-5">
    <div class="container">
        <div class="pb-6">
            <form action="{{ route('admin.paketjoki.update', $paketjoki->id) }}" method="POST"
                enctype="multipart/form-data" class="card">
                @csrf
                <div class="card-header">
                    <h1 class="card-title">
                        Edit Paket Joki
                    </h1>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id" value="{{ $paketjoki->id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="image" class="form-label">Foto Paket Joki</label>
                                <input class="form-control" type="file" id="image" name="image">
                                <p class="mt-4">Preview Sebelumnya : </p>
                                @if ($paketjoki->image)
                                    <img src="{{ asset('storage/' . $paketjoki->image) }}" alt="Post Image"
                                        class="mt-2" style="max-height: 200px;">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="categories_id" class="form-label">Kategori Paket Joki</label>
                                <select class="form-control" id="categories_id" name="categories_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $paketjoki->categories_id ? 'selected' : '' }}>
                                            {{ $category->nama_category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rank_awal" class="form-label">Rank Awal</label>
                                <input type="text" class="form-control" name="rank_awal"
                                    placeholder="example : Bronze" value="{{ $paketjoki->rank_awal }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rank_akhir" class="form-label">Rank Tujuan</label>
                                <input type="text" class="form-control" name="rank_akhir"
                                    value="{{ $paketjoki->rank_akhir }}" placeholder="example : Platinum">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="harga" class="form-label">Harga Paket</label>
                                <input type="text" class="form-control" name="harga" placeholder="example : 2000"
                                    value="{{ $paketjoki->harga }}">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary my-2">Simpan Data</button>
                    <a href="{{ route('admin.paketjoki') }}" ><button class="btn btn-danger" type="button">Batal Tambah data</button></a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<x-footer-admin></x-footer-admin>