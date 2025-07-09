@extends('member.main')
@section('container')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <h4 class="mb-4 fw-bold text-primary">
                <i class="fas fa-clipboard-list me-2"></i>Reservasi & Riwayat Sewa
            </h4>
        </div>
    </div>

    <!-- Current Reservations -->
    <div class="card border-0 shadow-sm rounded-3 mb-4">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-calendar-check me-2 text-primary"></i>Reservasi Aktif
                </h5>
                <span class="badge bg-primary rounded-pill">{{ count($reservasi) }}</span>
            </div>
        </div>
        <div class="card-body p-0">
            @if(count($reservasi) > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4 py-3">Tanggal & Waktu</th>
                                <th class="px-4 py-3">Informasi</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservasi as $item)
                                <tr>
                                <td class="px-4 py-3">
        <div class="d-flex align-items-center">
            <div class="calendar-icon me-3 text-center">
                <div class="bg-primary text-white rounded-top px-2 py-1">
                    {{ $item->order->first() ? date('M', strtotime($item->order->first()->starts)) : '-' }}
                </div>
                <div class="bg-light rounded-bottom px-2 py-1 border border-primary">
                    {{ $item->order->first() ? date('d', strtotime($item->order->first()->starts)) : '-' }}
                </div>
            </div>
            <div>
                {{ $item->order->first() ? date('H:i', strtotime($item->order->first()->starts)) : '-' }}
            </div>
        </div>
    </td>
                                    <td class="px-4 py-3">
                                        <div class="fw-bold text-primary">@money($item->total)</div>
                                        <div class="mt-1">
                                            <span class="badge bg-secondary rounded-pill">
                                                <i class="fas fa-camera me-1"></i>{{ $item->order->count() }} Alat
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($item->status == 1)
                                            <div class="d-flex align-items-center">
                                                <div class="status-indicator bg-warning me-2"></div>
                                                <span>Sedang Ditinjau</span>
                                            </div>
                                            <small class="text-muted d-block mt-1">Menunggu konfirmasi admin</small>
                                        @elseif ($item->status == 2)
                                            <div class="d-flex align-items-center">
                                                <div class="status-indicator bg-info me-2"></div>
                                                <span>Belum Bayar</span>
                                            </div>
                                            <small class="text-muted d-block mt-1">Silakan lakukan pembayaran</small>
                                        @elseif ($item->status == 3)
                                            <div class="d-flex align-items-center">
                                                <div class="status-indicator bg-success me-2"></div>
                                                <span>Sudah Bayar</span>
                                            </div>
                                            <small class="text-muted d-block mt-1">Siap untuk diambil</small>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <a class="btn btn-primary btn-sm" href="{{ route('order.detail',['id' => $item->id]) }}">
                                            <i class="fas fa-eye me-1"></i>Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <img src="https://cdn-icons-png.flaticon.com/512/3588/3588294.png" alt="No reservations" 
                         style="width: 80px; height: 80px; opacity: 0.5;" class="mb-3">
                    <h5 class="text-muted">Belum Ada Reservasi Aktif</h5>
                    <p class="text-muted mb-4">Anda belum melakukan reservasi apapun</p>
                    <a href="{{ route('member.index') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-1"></i>Mulai Reservasi Sekarang
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Reservation History -->
    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-history me-2 text-primary"></i>Riwayat Sewa
                </h5>
                <span class="badge bg-secondary rounded-pill">{{ count($riwayat) }}</span>
            </div>
        </div>
        <div class="card-body p-0">
            @if(count($riwayat) > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="dataTable">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4 py-3">Tanggal & Waktu</th>
                                <th class="px-4 py-3">Informasi</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat as $r)
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <div class="calendar-icon me-3 text-center">
                                                <div class="bg-secondary text-white rounded-top px-2 py-1">
                                                    <small>{{ date('M', strtotime($r->order->first()->starts)) }}</small>
                                                </div>
                                                <div class="bg-light rounded-bottom px-2 py-1 border border-secondary border-top-0">
                                                    <strong>{{ date('d', strtotime($r->order->first()->starts)) }}</strong>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ date('l', strtotime($r->order->first()->starts)) }}</div>
                                                <div class="text-muted small">
                                                    <i class="far fa-clock me-1"></i>{{ date('H:i', strtotime($r->order->first()->starts)) }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="fw-bold">@money($r->total)</div>
                                        <div class="mt-1">
                                            <span class="badge bg-secondary rounded-pill">
                                                <i class="fas fa-camera me-1"></i>{{ $r->order->count() }} Alat
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <div class="status-indicator bg-secondary me-2"></div>
                                            <span>Selesai</span>
                                        </div>
                                        <small class="text-muted d-block mt-1">Penyewaan telah selesai</small>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('order.detail',['id' => $r->id]) }}">
                                            <i class="fas fa-eye me-1"></i>Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png" alt="No history" 
                         style="width: 80px; height: 80px; opacity: 0.5;" class="mb-3">
                    <h5 class="text-muted">Belum Ada Riwayat Sewa</h5>
                    <p class="text-muted">Riwayat penyewaan Anda akan muncul di sini</p>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    /* Custom styles */
    .status-indicator {
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }
    
    .calendar-icon {
        min-width: 40px;
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
        
        tables.forEach(table => {
            const headerCells = table.querySelectorAll('thead th');
            const rows = table.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                cells.forEach((cell, index) => {
                    if (headerCells[index]) {
                        cell.setAttribute('data-label', headerCells[index].textContent);
                    }
                });
            });
        });
    });
</script>
@endsection