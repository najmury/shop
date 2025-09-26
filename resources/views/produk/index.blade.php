<x-layoutAdmin>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Produk</li>
        </ol>
    </div>

    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-table me-1"></i>
                    Daftar Produk
                </h6>
                <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus me-1"></i> Tambah Produk
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table id="datatablesSimple" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">Gambar</th>
                            <th>Nama Produk</th>
                            <th width="12%">Kategori</th>
                            <th width="12%">Harga</th>
                            <th width="8%">Stok</th>
                            <th width="10%">Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produks as $index => $produk)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="text-center">
                                    @if($produk->gambar)
                                        <img src="{{ asset('storage/'.$produk->gambar) }}" alt="{{ $produk->nama_produk }}"
                                            class="img-thumbnail" width="60" height="60" style="object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                            style="width: 60px; height: 60px;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>
                                    <span class="badge bg-secondary">{{ $produk->kategori->nama_kategori ?? '-' }}</span>
                                </td>
                                <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge {{ $produk->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $produk->stok }}
                                    </span>
                                </td>
                                <td>
                                    @if($produk->status == 'Aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @elseif($produk->status == 'Nonaktif')
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @else
                                        <span class="badge bg-danger">Stok Habis</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-info btn-sm"
                                        title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm"
                                        title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('produk.delete', $produk->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin hapus produk {{ $produk->nama_produk }}?')"
                                                    title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layoutAdmin>
