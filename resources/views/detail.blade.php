<html>
<head>
    <title>Detail - {{ $detail->nama_alat }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="/js/fullcalendar/main.css">
    <script src="/js/fullcalendar/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">

    {{-- Pesan sukses --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center mt-4">
        <div class="col-md-12 col-lg-4">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    @if (Auth::guest())
                        <i class="fas fa-arrow-left"></i> <a href="{{ route('home') }}" class="link-dark">Kembali</a>
                    @elseif (Auth::user()->role == 0)
                        <i class="fas fa-arrow-left"></i> <a href="{{ route('member.index') }}" class="link-dark">Kembali</a>
                    @else
                        <i class="fas fa-arrow-left"></i> <a href="{{ url()->previous() }}" class="link-dark">Kembali</a>
                    @endif
                </div>
                <img class="card-img-top" src="{{ url('') }}/images/{{ $detail->gambar }}" alt="">
                <div class="mt-3">
                    @if (Auth::check() && Auth::user()->role == 0)
                        <form action="{{ route('cart.store', ['id' => $detail->id, 'userId' => Auth::user()->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success mx-2" name="btn" value="24">
                                <i class="fas fa-shopping-cart"></i> @money($detail->harga24) <b>24jam</b>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary mx-2">
                            <i class="fas fa-sign-in-alt"></i> Login untuk sewa 24jam
                        </a>
                    @endif

                    <p class="text-muted mt-3">
                        <small><i class="fas fa-info-circle me-1"></i>
                        Penyewaan kamera bersifat <strong>harian</strong>. Harga berlaku untuk setiap 24 jam. Silakan tentukan tanggal pengambilan saat checkout.</small>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-8 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h4><span class="badge bg-warning">{{ $detail->category->nama_kategori }}</span></h4>
                    <h1><b>{{ $detail->nama_alat }}</b></h1>
                    <p class="text-muted">{{ $detail->deskripsi }}</p>

                    <hr>
                    <h6><i>Daftar Pinjaman Mendatang</i></h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tanggal Keluar</th>
                                <th>Tanggal Kembali</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                                @if ($item->payment->status == 3)
                                <tr>
                                    <td>{{ date('d M Y H:i', strtotime($item->starts)) }} <span class="badge bg-secondary">{{ $item->durasi }} Jam</span></td>
                                    <td>{{ date('d M Y H:i', strtotime($item->ends)) }}</td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <hr>
                    <h5>Upload Bukti Pembayaran</h5>
                    <form action="{{ route('pembayaran.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="rental_id" value="{{ $detail->id }}">
                        <div class="mb-2">
                            <label>Metode Pembayaran</label>
                            <select name="metode" class="form-control">
                                <option value="transfer">Transfer Bank</option>
                                <option value="ewallet">E-Wallet</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" step="0.01" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Upload Bukti Pembayaran</label>
                            <input type="file" name="bukti" accept="image/*" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Bukti</button>
                    </form>

                </div>
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var endpoint = "/api/kalender-alat/";
    var param = {!! $detail->id !!};
    var withParam = endpoint + param;
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            height: 500,
            selectable: true,
            navLinks: true,
            eventSources: [{
                url: withParam,
                color: 'yellow',
                textColor: 'black'
            }],
            eventTimeFormat: {
                hour: 'numeric',
                minute: '2-digit',
                hour12: false
            },
            headerToolbar: {
                left: 'dayGridMonth,timeGridDay',
                center: 'title',
            }
        });
        calendar.render();
    });
</script>
</body>
</html>

<!-- resources/views/rental/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Form Pemesanan Bus: <strong>{{ $bus->nama_bus }}</strong></h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('rental.store') }}">
        @csrf
        <input type="hidden" name="bus_id" value="{{ $bus->id }}">

        <div class="mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
    </form>

    <hr>
    <h5>Informasi Bus</h5>
    <p><strong>Kapasitas:</strong> {{ $bus->kapasitas }} orang</p>
    <p><strong>Harga per Hari:</strong> @currency($bus->harga_per_hari)</p>
    <p><strong>Deskripsi:</strong> {{ $bus->deskripsi }}</p>

    @if($bus->gambar)
        <img src="{{ asset('storage/' . $bus->gambar) }}" class="img-fluid mt-3" alt="Foto Bus">
    @endif
</div>
@endsection
