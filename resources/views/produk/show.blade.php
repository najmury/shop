<x-layoutAdmin>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
            <li class="breadcrumb-item active">Detail Produk</li>
        </ol>
    </div>

    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-info-circle me-1"></i>
                    Informasi Produk
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        @if($produk->gambar)
                            <img src="{{ asset('storage/'.$produk->gambar) }}" alt="{{ $produk->nama_produk }}"
                                class="img-fluid rounded" style="max-height: 300px;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                style="height: 300px;">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                            <small class="text-muted">Tidak ada gambar</small>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Nama Produk</th>
                                <td>{{ $produk->nama_produk }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>
                                    <span class="badge bg-secondary">{{ $produk->kategori->nama_kategori ?? '-' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td class="fw-bold text-primary">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>
                                    <span class="badge {{ $produk->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $produk->stok }} unit
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($produk->status == 'Aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @elseif($produk->status == 'Nonaktif')
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @else
                                        <span class="badge bg-danger">Stok Habis</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Dibuat</th>
                                <td>{{ $produk->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Terakhir Diupdate</th>
                                <td>{{ $produk->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </table>

                        @if($produk->deskripsi)
                            <div class="mt-3">
                                <h6>Deskripsi Produk:</h6>
                                <p class="text-muted">{{ $produk->deskripsi }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{ route('produk.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <div>
                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                        <a href="{{ route('produk.index') }}" class="btn btn-primary">
                            <i class="fas fa-list me-1"></i> Daftar Produk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layoutAdmin>
