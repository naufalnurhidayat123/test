<x-head-admin />
<x-header-admin />
<div class="my-3 my-md-5">
    <div class="container">
        <div class="pb-6">
            <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data"
                class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Joki</h3>
                </div>
                @csrf
                <div class="card-body">

                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <div class="mb-3">
                        <label for="image" class="form-label">Foto Paket Joki</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <p class="mt-4">Preview Sebelumnya :</p>
                        <div class="">
                            @if ($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" alt="Post Image" class="mt-2"
                            style="max-height: 100px;">
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Kategori Paket Joki</label>
                        <input type="text" class="form-control @error('nama_category') is-invalid @enderror"
                            name="nama_category" value="{{ $category->nama_category }}"
                            placeholder="example : Paket A...">
                        @error('nama_category')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Deskripsi Paket Joki</label>
                        <input type="text" class="form-control @error('deskripsi_category') is-invalid @enderror"
                            name="deskripsi_category" value="{{ $category->deskripsi_category }}"
                            placeholder="example : Paket A...">
                        @error('deskripsi_category')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Simpan Data</button>
                    <a href="{{ route('admin.category') }}" class="btn btn-danger">Batalkan Edit data</a>
                </div>
            </form>
        </div>
    </div>
</div>
<x-footer-admin></x-footer-admin>