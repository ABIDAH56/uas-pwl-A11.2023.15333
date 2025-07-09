@extends('member.main')
@section('container')
<div class="container py-4">
    <div class="card border-0 shadow-sm rounded-3">
        <!-- Card Header with Status -->
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <a href="{{ route('order.show') }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-arrow-left me-1"></i>Kembali
                </a>
                <h5 class="fw-bold mb-0 my-2">Detail Reservasi</h5>
                <div>
                    @if ($paymentStatus == 1)
                        <span class="badge bg-warning px-3 py-2">
                            <i class="fas fa-clock me-1"></i>Sedang Ditinjau
                        </span>
                    @elseif ($paymentStatus == 2)
                        <span class="badge bg-info px-3 py-2">
                            <i class="fas fa-hourglass-half me-1"></i>Belum Bayar
                        </span>
                    @elseif ($paymentStatus == 3)
                        <span class="badge bg-success px-3 py-2">
                            <i class="fas fa-check-circle me-1"></i>Sudah Bayar
                        </span>
                    @elseif ($paymentStatus == 4)
                        <span class="badge bg-secondary px-3 py-2">
                            <i class="fas fa-check-double me-1"></i>Selesai
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-body">
            <!-- Alert for Paid Status -->
            @if ($paymentStatus == 3)
                <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                    <i class="fas fa-info-circle me-3 fs-4"></i>
                    <div>Silakan melakukan pengambilan alat pada tanggal yang tertera</div>
                </div>
            @endif

            <!-- Reservation Info -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-3 text-muted">
                                <i class="fas fa-info-circle me-2"></i>Informasi Reservasi
                            </h6>
                            
                            <div class="d-flex mb-3">
                                <div class="calendar-icon me-3 text-center">
                                    <div class="bg-primary text-white rounded-top px-2 py-1">
                                        <small>{{ date('M', strtotime($detail->first()->starts)) }}</small>
                                    </div>
                                    <div class="bg-white rounded-bottom px-2 py-1 border border-primary border-top-0">
                                        <strong>{{ date('d', strtotime($detail->first()->starts)) }}</strong>
                                    </div>
                                </div>
                                <div>
                                    <div class="text-muted small">Tanggal & Waktu Pengambilan</div>
                                    <div class="fw-bold">
                                        {{ date('l, d M Y', strtotime($detail->first()->starts)) }}
                                        <span class="badge bg-light text-dark ms-1">
                                            <i class="far fa-clock me-1"></i>{{ date('H:i', strtotime($detail->first()->starts)) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-0">
                                <div class="text-muted small">Nomor Invoice</div>
                                <div class="fw-bold">{{ $detail->first()->payment->no_invoice }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mt-3 mt-md-0">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-3 text-muted">
                                <i class="fas fa-money-bill-wave me-2"></i>Ringkasan Pembayaran
                            </h6>
                            
                            <div class="d-flex justify-content-between mb-2">
                                <span>Jumlah Item</span>
                                <span class="fw-bold">{{ count($detail) }} item</span>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <span>Total Pembayaran</span>
                                <span class="fw-bold text-primary fs-5">@money($total)</span>
                            </div>
                            
                            @if ($paymentStatus == 2 && $detail->first()->payment->bukti == NULL)
                                <div class="mt-3 pt-2 border-top">
                                    <button type="button" class="btn btn-primary btn-sm w-100" data-bs-toggle="modal" data-bs-target="#bayarModal">
                                        <i class="fas fa-upload me-1"></i>Upload Bukti Pembayaran
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Instructions -->
            @if ($paymentStatus == 2)
                <div class="alert {{ ($detail->first()->payment->bukti == NULL) ? 'alert-primary' : 'alert-success'}} mb-4">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="fas {{ ($detail->first()->payment->bukti == NULL) ? 'fa-info-circle' : 'fa-check-circle' }} fa-2x"></i>
                        </div>
                        <div>
                            @if ($detail->first()->payment->bukti == NULL)
                                <h5 class="alert-heading">Instruksi Pembayaran</h5>
                                <p>Reservasi anda telah disetujui, silakan bayar sesuai dengan total yang tertera dengan cara transfer ke:</p>
                                <div class="bg-white p-3 rounded mb-3 border">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img src="https://upload.wikimedia.org/wikipedia/id/thumb/5/55/BNI_logo.svg/1200px-BNI_logo.svg.png" alt="BNI Logo" height="30">
                                        </div>
                                        <div class="col">
                                            <h5 class="mb-1">BNI xxxxxxxxxx</h5>
                                            <p class="mb-0">a.n Dendra Kurnianto</p>
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-sm btn-outline-primary" onclick="copyToClipboard('xxxxxxxxxx')">
                                                <i class="fas fa-copy me-1"></i>Salin
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-0">Setelah melakukan pembayaran, silakan upload bukti pembayaran dengan menekan tombol di atas.</p>
                            @else
                                <h5 class="alert-heading">Pembayaran Dalam Proses</h5>
                                <p class="mb-0">Bukti pembayaran telah di upload, silakan tunggu konfirmasi dari Admin.</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Equipment List -->
            <h6 class="fw-bold mb-3">
                <i class="fas fa-list me-2"></i>Daftar Peralatan
            </h6>
            
            <div class="table-responsive mb-4">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3" width="50">No</th>
                            <th class="py-3">Peralatan</th>
                            <th class="py-3">Pengembalian</th>
                            <th class="py-3 text-end">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detail as $item)
                            <tr class="{{ ($item->status == 3) ? 'table-danger' : '' }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <a class="text-decoration-none fw-bold mb-1" href="{{ route('home.detail',['id' => $item->alat->id]) }}">
                                            {{ $item->alat->nama_alat }}
                                        </a>
                                        <div>
                                            <span class="badge bg-warning rounded-pill me-1">
                                                {{ $item->alat->category->nama_kategori }}
                                            </span>
                                            <span class="badge bg-secondary rounded-pill me-1">
                                                {{ $item->durasi }} Jam
                                            </span>
                                            @if ($item->status === 3)
                                                <span class="badge bg-danger rounded-pill">
                                                    <i class="fas fa-times-circle me-1"></i>Ditolak
                                                </span>
                                            @elseif ($item->status === 2)
                                                <span class="badge bg-success rounded-pill">
                                                    <i class="fas fa-check-circle me-1"></i>ACC
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="far fa-calendar-alt text-muted me-2"></i>
                                        <span>{{ date('d M Y', strtotime($item->ends)) }}</span>
                                        <span class="badge bg-light text-dark ms-2">
                                            <i class="far fa-clock me-1"></i>{{ date('H:i', strtotime($item->ends)) }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-end fw-bold">@money($item->harga)</td>
                            </tr>
                        @endforeach
                        <tr class="table-light">
                            <td colspan="2"></td>
                            <td class="text-end fw-bold">Total</td>
                            <td class="text-end fw-bold text-primary fs-5">@money($total)</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Payment Proof -->
            @if ($paymentStatus == 3 || $paymentStatus == 4)
                <div class="card border-0 bg-light mb-3">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">
                            <i class="fas fa-receipt me-2"></i>Bukti Pembayaran
                        </h6>
                        <div class="text-center">
                            <img src="{{ url('') }}/images/evidence/{{ $bukti }}" alt="Bukti Pembayaran" 
                                 class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                        </div>
                    </div>
                </div>
            @endif

            <!-- Cancel Button -->
            @if ($paymentStatus == 1)
                <div class="text-end mt-3">
                    <form action="{{ route('cancel',['id' => $detail->first()->payment->id]) }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('Anda yakin akan membatalkan reservasi?');">
                            <i class="fas fa-times-circle me-1"></i>Batalkan Reservasi
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Payment Proof Modal -->
<div class="modal fade" id="bayarModal" tabindex="-1" aria-labelledby="bayarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bayarModalLabel">
                    <i class="fas fa-upload me-2"></i>Upload Bukti Pembayaran
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bayar',['id' => $paymentId]) }}" method="POST" enctype="multipart/form-data" id="paymentForm">
                    @method('PATCH')
                    @csrf
                    <div class="mb-3">
                        <label for="bukti" class="form-label">Pilih File Bukti Pembayaran</label>
                        <input type="file" name="bukti" id="bukti" class="form-control" accept="image/*" required>
                        <div class="form-text">Format yang didukung: JPG, PNG, JPEG. Maksimal 2MB.</div>
                    </div>
                    
                    <div id="imagePreview" class="text-center mb-3 d-none">
                        <p class="text-muted small">Preview:</p>
                        <img src="/placeholder.svg" alt="Preview" class="img-fluid rounded" style="max-height: 200px;">
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload me-1"></i>Upload Bukti Pembayaran
                        </button>
                    </div>
                </form>
                
                @if($bukti)
                    <hr>
                    <h6 class="mb-3">Bukti Pembayaran Saat Ini</h6>
                    <div class="text-center">
                        <img src="{{ url('') }}/images/evidence/{{ $bukti }}" alt="Bukti Pembayaran" 
                             class="img-fluid rounded shadow-sm" style="max-height: 200px;">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom styles */
    .calendar-icon {
        min-width: 40px;
    }
    
    .hover-shadow:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        transition: all 0.3s ease;
    }
    
    /* Responsive table adjustments */
    @media (max-width: 767.98px) {
        .table-responsive {
            border: 0;
        }
        
        .table thead {
            display: none;
        }
        
        .table, .table tbody, .table tr, .table td {
            display: block;
            width: 100%;
        }
        
        .table tr {
            margin-bottom: 1rem;
            border-bottom: 2px solid #e9ecef;
        }
        
        .table td {
            text-align: right;
            position: relative;
            padding-left: 50%;
        }
        
        .table td:before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-weight: bold;
            text-align: left;
        }
    }
</style>

<script>
    // Add data-label attributes to table cells for responsive view
    document.addEventListener('DOMContentLoaded', function() {
        const tables = document.querySelectorAll('table');
        const headerLabels = ['No', 'Peralatan', 'Pengembalian', 'Harga'];
        
        tables.forEach(table => {
            const rows = table.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                cells.forEach((cell, index) => {
                    if (headerLabels[index]) {
                        cell.setAttribute('data-label', headerLabels[index]);
                    }
                });
            });
        });
        
        // Image preview for file upload
        const fileInput = document.getElementById('bukti');
        const imagePreview = document.getElementById('imagePreview');
        
        if (fileInput) {
            fileInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        imagePreview.classList.remove('d-none');
                        imagePreview.querySelector('img').src = e.target.result;
                    }
                    
                    reader.readAsDataURL(this.files[0]);
                } else {
                    imagePreview.classList.add('d-none');
                }
            });
        }
    });
    
    // Copy to clipboard function
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            alert('Nomor rekening berhasil disalin!');
        }, function() {
            alert('Gagal menyalin nomor rekening');
        });
    }
</script>
@endsection