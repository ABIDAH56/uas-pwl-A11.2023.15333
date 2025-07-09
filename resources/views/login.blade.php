<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login - Bidzshoot Kamera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Navbar minimal (optional) -->
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-camera-retro me-2"></i>Bidzshoot
            </a>
        </div>
    </nav>

    <!-- Login Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="login-section bg-white p-5 shadow-sm rounded">
                        <div class="row g-0"> 
                            <div class="col-md-6 pe-md-4 mb-4 mb-md-0">
                                <h3 class="mb-4">Belum Punya Akun?</h3>
                                <p>Daftar sekarang dan nikmati kemudahan reservasi alat fotografi.</p>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check-circle text-primary me-2"></i> Reservasi online 24/7</li>
                                    <li><i class="fas fa-check-circle text-primary me-2"></i> Riwayat penyewaan lengkap</li>
                                    <li><i class="fas fa-check-circle text-primary me-2"></i> Notifikasi status pesanan</li>
                                    <li><i class="fas fa-check-circle text-primary me-2"></i> Proses cepat & efisien</li>
                                </ul>
                                <a href="{{ route('daftar') }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                                </a>
                            </div>
                            <div class="col-md-6 ps-md-4 border-start">
                                <h3 class="mb-4">Login</h3>

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @include('partials.login') {{-- ini bagian form login --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
