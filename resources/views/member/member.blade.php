@extends('member.main')
@section('container')
<div class="container py-4">
    <!-- Alert Messages -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-start border-success border-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle me-2"></i>
                <div>
                    {{ session('success') }} &nbsp; 
                    <a href="#keranjang" class="alert-link">Lihat keranjang</a>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- Main Content Area -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-3 mb-4">
                <div class="card-body">
                    <!-- Search Bar -->
                    <form action="">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari peralatan..." name="search" 
                                {{ (request()->get('search') != null) ? "value = ".request()->get('search')."" : "" }}>
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search me-1"></i> Cari
                            </button>
                        </div>
                    </form>

                    <!-- Search Results Info -->
                    @if (request()->get('search') != null)
                        <div class="alert alert-light border mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-info-circle me-2 text-primary"></i>
                                <div>
                                    Menampilkan hasil pencarian <b>"{{ request()->get('search') }}"</b>
                                    <a class="ms-2 text-decoration-none" href="{{ route('member.index') }}">
                                        <i class="fas fa-times-circle"></i> Hapus filter
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Category Filters -->
            @if (request()->get('search') == null)
                <div class="card shadow-sm border-0 rounded-3 mb-4">
                    <div class="card-body">
                        <h6 class="mb-3 text-muted">
                            <i class="fas fa-filter me-2"></i>Filter Kategori
                        </h6>
                        <div class="d-flex flex-wrap gap-2" style="overflow-x: auto; padding-bottom: 8px;">
                            <a class="btn {{ (request('kategori') == null) ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill" 
                               href="{{ route('member.index') }}">
                                Semua
                            </a>
                            @foreach ($kategori as $cat)
                                <a class="btn {{ (request('kategori') == $cat->id) ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill" 
                                   href="?kategori={{ $cat->id }}">
                                    {{ $cat->nama_kategori }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Equipment Cards -->
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-white py-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Katalog Peralatan</h5>
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>Klik nama alat untuk detail
                        </small>
                    </div>
                </div>
                <div class="card-body" style="max-height: 600px; overflow-y: auto;">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-3">
                        @forelse ($alat as $item)
                            <div class="col">
                                <div class="card h-100 border-0 shadow-sm hover-shadow">
                                    <div class="position-relative">
                                        <img class="card-img-top" src="{{ url('') }}/images/{{ $item->gambar }}" 
                                             style="height: 160px; object-fit: cover;" alt="{{ $item->nama_alat }}">
                                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" 
                                             style="background: rgba(0,0,0,0.5);">
                                            <a href="{{ route('home.detail',['id' => $item->id]) }}" 
                                               class="btn btn-sm btn-light rounded-circle">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                        <span class="position-absolute top-0 end-0 badge bg-warning m-2 rounded-pill">
                                            {{ $item->category->nama_kategori }}
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title mb-2">
                                            <a class="text-decoration-none text-dark stretched-link" 
                                               href="{{ route('home.detail',['id' => $item->id]) }}">
                                                {{ $item->nama_alat }}
                                            </a>
                                        </h6>
                                        <p class="card-text small text-muted mb-3" style="height: 40px; overflow: hidden;">
                                            {{ Str::limit($item->deskripsi, 60) }}
                                        </p>
                                        
                                        <div class="price-list mb-3">
                                            <div class="d-flex justify-content-between align-items-center mb-1 pb-1 border-bottom">
                                                <span class="fw-bold text-primary">@money($item->harga24)</span>
                                                <span class="badge bg-light text-dark">24 jam</span>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-top pt-3">
                                        <form action="{{ route('cart.store',['id' => $item->id, 'userId' => Auth::user()->id]) }}" method="POST">
                                            @csrf
                                            <div class="dropdown">
                                                <button class="btn btn-primary w-100 dropdown-toggle" type="button" 
                                                        id="addtocartdropdown{{ $item->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-cart-plus me-1"></i> Tambah ke Keranjang
                                                </button>
                                                <ul class="dropdown-menu w-100" aria-labelledby="addtocartdropdown{{ $item->id }}">
                                                    <li>
                                                        <button type="submit" class="dropdown-item" name="btn" value="24">
                                                            <i class="fas fa-shopping-cart me-1"></i> @money($item->harga24) <span class="fw-bold ms-1">24 jam</span>
                                                        </button>
                                                    </li>
                                                   
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486754.png" alt="No items found" 
                                     style="width: 80px; height: 80px; opacity: 0.5;" class="mb-3">
                                <h5 class="text-muted">Tidak ada peralatan yang ditemukan</h5>
                                <p class="text-muted">Coba gunakan kata kunci lain atau hapus filter</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Shopping Cart Sidebar -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 rounded-3 sticky-lg-top" style="top: 20px;" id="keranjang">
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-shopping-cart me-2"></i>Keranjang Sewa
                        </h5>
                        <span class="badge bg-white text-primary rounded-pill">{{ Auth::user()->cart->count() }}</span>
                    </div>
                </div>
                <div class="card-body">
                    @if(count($carts) > 0)
                        <div class="list-group list-group-flush mb-3">
                            @foreach ($carts as $item)
                                <div class="list-group-item px-0 py-3 border-bottom">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h6 class="mb-0 me-2">{{ $item->alat->nama_alat }}</h6>
                                        <span class="badge bg-primary rounded-pill">{{ $item->durasi }} Jam</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-bold text-primary">@money($item->harga)</span>
                                        <form action="{{ route('cart.destroy',['id' => $item->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-outline-danger" type="submit">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded-3 mb-4">
                            <h5 class="mb-0">Total</h5>
                            <h5 class="mb-0 text-primary total-price">@money($total)</h5>

                        </div>
                        <form action="{{ route('order.create') }}" method="POST" id="checkoutForm">
    @csrf
    <div class="mb-3">
        <label class="form-label">
            <i class="far fa-calendar-alt me-1"></i>Jumlah Hari Sewa
        </label>
        <input type="number" name="days" id="days" value="1" min="1" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">
            <i class="far fa-calendar-alt me-1"></i>Tanggal Pengambilan
        </label>
        <input type="date" name="start_date" class="form-control" required>
    </div>
    <div class="mb-4">
        <label class="form-label">
            <i class="far fa-clock me-1"></i>Jam Pengambilan
        </label>
        <input type="time" name="start_time" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success w-100 py-2" 
            {{ (Auth::user()->cart->count() == 0) ? 'disabled' : '' }}>
        <i class="fas fa-check-circle me-1"></i> Checkout
    </button>
</form>

                    @else
                        <div class="text-center py-4">
                            <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png" alt="Empty cart" 
                                 style="width: 80px; height: 80px; opacity: 0.5;" class="mb-3">
                            <h6 class="text-muted">Keranjang Anda Kosong</h6>
                            <p class="text-muted small">Tambahkan peralatan ke keranjang untuk mulai menyewa</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const daysInput = document.getElementById('days');
        const totalPriceEl = document.querySelector('.total-price'); // nanti kita tambahkan class ini di total harga
        const cartItems = @json($carts); // bawa data cart ke JS untuk hitung ulang

        function formatRupiah(num) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(num);
        }

        function calculateTotal() {
            let days = parseInt(daysInput.value) || 1;
            if (days < 1) days = 1;
            let total = 0;
            cartItems.forEach(item => {
                total += item.harga * days;  // harga per item * jumlah hari
            });
            // Update total harga di UI
            totalPriceEl.textContent = formatRupiah(total);
        }

        daysInput.addEventListener('input', calculateTotal);

        calculateTotal(); // hitung sekali saat load
    });
</script>

<style>
    /* Custom styles */
    .hover-shadow:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    /* Scrollbar styling */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
    
    /* Responsive adjustments */
    @media (max-width: 991.98px) {
        .sticky-lg-top {
            position: relative;
            top: 0 !important;
        }
    }
</style>
@endsection