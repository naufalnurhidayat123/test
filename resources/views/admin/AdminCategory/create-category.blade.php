<x-head-admin />
<x-header-admin />
<div class="my-3 my-md-5">
    <div class="container">
        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data" class="card">
            <div class="card-header">
                <h3 class="card-title"><strong>Tambah Data Category</strong> </h3>
            </div>
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="image" class="form-label">Foto Paket Joki</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Kategori Paket Joki</label>
                    <input type="text" class="form-control @error('nama_category') is-invalid @enderror"
                        name="nama_category" value="{{ old('nama_category') }}" placeholder="example : Paket A...">
                    @error('nama_category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Deskripsi Paket Joki</label>
                    <input type="text" class="form-control @error('deskripsi_category') is-invalid @enderror" value="{{ old('deskripsi_category') }}"
                        name="deskripsi_category" placeholder="example : paket A ini di khususkan untuk rank kecil">
                    @error('deskripsi_category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary my-2">Simpan Data</button>
                <a href="{{ route('admin.category') }}" class=""><button class="btn btn-danger" type="button">Batal Tambah Data</button></a>
            </div>
        </form>
    </div>
</div>

<x-footer-admin />
