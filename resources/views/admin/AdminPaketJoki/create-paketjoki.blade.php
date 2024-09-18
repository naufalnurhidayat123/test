<x-head-admin />
<x-header-admin />
<div class="my-3 my-md-5">
    <div class="container">
        <div class="pb-6">
            <form action="{{ route('admin.paketjoki.store') }}" method="POST" enctype="multipart/form-data" class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Paket Joki</h3>
                </div>
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="image" class="form-label">Foto Paket Joki</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    id="image" name="image">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="categories_id" class="form-label">Kategori Paket Joki</label>
                                <select class="form-control @error('categories_id') is-invalid @enderror"
                                    id="categories_id" name="categories_id">
                                    <option value="">Pilih Category Paket</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->nama_category }}</option>
                                    @endforeach
                                </select>
                                @error('categories_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="rank_awal" class="form-label">Rank Awal</label>
                                <input type="text" class="form-control @error('rank_awal') is-invalid @enderror"
                                    name="rank_awal" placeholder="example : Bronze" value="{{ old('rank_awal') }}">
                                @error('rank_awal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="rank_akhir" class="form-label">Rank Tujuan</label>
                                <input type="text" class="form-control @error('rank_akhir') is-invalid @enderror"
                                    name="rank_akhir" placeholder="example : Platinum" value="{{ old('rank_akhir') }}">
                                @error('rank_akhir')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="harga" class="form-label">Harga Paket</label>
                                <input type="text" class="form-control @error('harga') is-invalid @enderror"
                                    name="harga" placeholder="example : 2000" value="{{ old('harga_paket') }}">
                                @error('harga')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary my-2">Simpan Data</button>
                    <a href="{{ route('admin.paketjoki') }}" ><button
                            type="button" class="btn btn-danger" >Batal Tambah data</button></a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<x-footer-admin />
