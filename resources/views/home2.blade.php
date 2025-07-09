<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Bidz Kamera Semarang - Rental kamera dan peralatan fotografi terlengkap" />
    <meta name="author" content="Abidz Store" />
    <title>Bidz Kamera Semarang</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Swiper CSS for slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- Custom styles -->
    <style>
        :root {
            --primary-color: #2e86de;
            --secondary-color: #222f3e;
            --accent-color: #54a0ff;
            --light-color: #f5f6fa;
            --dark-color: #2c3e50;
            --success-color: #10ac84;
            --warning-color: #ff9f43;
            --danger-color: #ee5253;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            overflow-x: hidden;
        }
        
        /* Navigation */
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 0.75rem 1rem;
            background-color: white;
            z-index: 1000;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
            color: var(--primary-color);
        }
        
        .nav-link {
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary-color) !important;
        }
        
        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }
        
        /* Hero Section - Full Height */
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1516035069371-29a1b244cc32?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .hero-content {
            text-align: center;
            z-index: 2;
        }
        
        .hero-title {
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 3.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
        .hero-subtitle {
            font-weight: 300;
            margin-bottom: 2rem;
            opacity: 0.95;
            font-size: 1.25rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }
        
        /* Buttons */
        .btn {
            font-weight: 500;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover, .btn-primary:focus {
            background-color: #1c75c8;
            border-color: #1c75c8;
            box-shadow: 0 8px 25px rgba(46, 134, 222, 0.4);
            transform: translateY(-2px);
        }
        
        .btn-outline-light {
            border-width: 2px;
        }
        
        .btn-outline-light:hover {
            background-color: white;
            color: var(--primary-color);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }
        
        /* Sections */
        section {
            padding: 5rem 0;
        }
        
        .section-title {
            font-weight: 700;
            margin-bottom: 3rem;
            color: var(--secondary-color);
            position: relative;
            display: inline-block;
            font-size: 2.5rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            width: 60px;
            height: 4px;
            background-color: var(--primary-color);
            bottom: -15px;
            left: 0;
        }
        
        .text-center .section-title:after {
            left: 50%;
            transform: translateX(-50%);
        }
        /* Product Slider Styles */
.product-slider {
    padding: 2rem 0;
    overflow: hidden; /* Hindari keluar dari section */
}

.product-slider .swiper {
    width: 100%;
    padding: 20px 0 50px 0;
    box-sizing: border-box;
}

.product-slider .swiper-wrapper {
    display: flex;
    align-items: stretch;
}

.product-slider .swiper-slide {
    height: auto;
    width: 300px !important; /* Batasi lebar max card */
    max-width: 100%;
    display: flex;
    align-items: stretch;
}

.product-slider .swiper-pagination {
    bottom: 0;
}

.swiper-pagination-bullet {
    background-color: var(--primary-color);
    opacity: 0.3;
}

.swiper-pagination-bullet-active {
    opacity: 1;
}

.swiper-button-next,
.swiper-button-prev {
    color: var(--primary-color);
    background: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    top: 35%; /* Agar tidak menempel atas */
}

.swiper-button-next:after,
.swiper-button-prev:after {
    font-size: 20px;
}

/* Card Styles */
.card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.4s ease;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.card-img-top {
    height: 220px;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.card:hover .card-img-top {
    transform: scale(1.05);
}

.card-title {
    font-weight: 600;
    font-size: 1.1rem;
    margin-top: 0.5rem;
    margin-bottom: 1rem;
    line-height: 1.4;
    height: 3rem;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

        /* Category Badge */
        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            color: white;
            font-weight: 600;
            font-size: 0.75rem;
            padding: 0.4rem 1rem;
            border-radius: 25px;
            z-index: 1;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        
        /* Price and Duration */
        .price-tag {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.1rem;
        }
        
        .duration-badge {
            background: linear-gradient(45deg, var(--light-color), #e9ecef);
            color: var(--secondary-color);
            font-weight: 600;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.75rem;
        }
        
        /* Filters */
        .filter-btn {
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .filter-btn.active {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46, 134, 222, 0.3);
        }
        
        .filter-container {
            overflow-x: auto;
            white-space: nowrap;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        .filter-container::-webkit-scrollbar {
            display: none;
        }
        
        /* Search Box */
        .search-box {
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }
        
        .search-input {
            border: none;
            padding: 1rem 1.5rem;
            height: 100%;
            font-size: 1rem;
        }
        
        .search-input:focus {
            box-shadow: none;
            border-color: var(--primary-color);
        }
        
        .search-btn {
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            color: white;
            border: none;
            padding: 1rem 2rem;
            font-weight: 600;
        }
        
        .login-section {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--secondary-color), var(--dark-color));
            color: white;
            padding: 4rem 0 1rem;
        }
        
        .footer-title {
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
        }
        
        .footer-link {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            display: block;
            margin-bottom: 0.75rem;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        
        .footer-link:hover {
            color: var(--primary-color);
            transform: translateX(5px);
        }
        
        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            margin-right: 0.75rem;
            transition: all 0.3s ease;
            color: white;
            text-decoration: none;
        }
        
        .social-icon:hover {
            background-color: var(--primary-color);
            transform: translateY(-3px);
            color: white;
            box-shadow: 0 5px 15px rgba(46, 134, 222, 0.4);
        }
        
        .copyright {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 2rem;
            margin-top: 3rem;
            font-size: 0.9rem;
            color: rgba(255,255,255,0.7);
        }
        
        /* Alerts */
        .alert {
            border-radius: 15px;
            padding: 1.25rem;
            margin-bottom: 2rem;
            border: none;
        }
        
        /* Contact Cards */
        .contact-card {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 15px;
            border: none;
        }
        
        .contact-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.12);
        }
        
        .contact-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 1199.98px) {
            .card-img-top {
                height: 200px;
            }
            .hero-title {
                font-size: 3rem;
            }
        }
        
        @media (max-width: 991.98px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .card-img-top {
                height: 180px;
            }
        }
        
        @media (max-width: 767.98px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.75rem;
            }
            
            .card-img-top {
                height: 200px;
            }
            
            .login-section {
                padding: 1.5rem;
            }
            
            .footer-title {
                margin-top: 2rem;
            }
            
            .border-start {
                border-left: none !important;
            }
            
            .login-section .col-md-6 {
                border-top: 1px solid #dee2e6;
                padding-top: 2rem !important;
            }
            
            .login-section .col-md-6:first-child {
                border-top: none;
                padding-bottom: 1rem;
            }
        }
        
        @media (max-width: 575.98px) {
            .hero-title {
                font-size: 1.75rem;
            }
            
            .btn {
                padding: 0.6rem 1.5rem;
                font-size: 0.9rem;
            }
            
            .card-img-top {
                height: 180px;
            }
            
            .price-tag {
                font-size: 1rem;
            }
            
            .duration-badge {
                font-size: 0.7rem;
                padding: 0.2rem 0.6rem;
            }
            
            .filter-btn {
                font-size: 0.85rem;
                padding: 0.4rem 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-camera-retro me-2"></i>Abidz Store
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" 
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#katalog">Katalog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    @if (!Auth::check())
                        <li class="nav-item"><a class="nav-link" href="#login">Login</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-primary text-white px-3 py-2 ms-2 my-1" href="{{ route('daftar') }}">Daftar</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" 
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                @if(Auth::user()->role == 0)
                                    <li><a class="dropdown-item" href="{{ route('member.index') }}">Dashboard</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('admin.index') }}">Admin Panel</a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section - Full Height -->
    <section class="hero-section">
        <div class="hero-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <h1 class="hero-title">Sewa Kamera & Peralatan Fotografi</h1>
                        <p class="hero-subtitle">Dapatkan peralatan fotografi berkualitas tinggi dengan harga terjangkau untuk kebutuhan fotografi Anda</p>
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a href="#katalog" class="btn btn-primary mb-2">
                                <i class="fas fa-camera me-2"></i>Lihat Katalog
                            </a>
                            @if (!Auth::check())
                                <a href="#login" class="btn btn-outline-light mb-2">
                                    <i class="fas fa-sign-in-alt me-2"></i>Login
                                </a>
                            @else
                                <a href="{{ Auth::user()->role == 0 ? route('member.index') : route('admin.index') }}" class="btn btn-outline-light mb-2">
                                    <i class="fas fa-tachometer-alt me-2"></i>
                                    {{ Auth::user()->role == 0 ? 'Mulai Menyewa' : 'Dashboard Admin' }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Catalog Section -->
    <section id="katalog">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">Katalog Peralatan</h2>
                    <p class="lead">Pilihan lengkap peralatan fotografi berkualitas tinggi</p>
                </div>
            </div>

            <!-- Alert Messages -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    @if (session()->has('registrasi'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('registrasi') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (Auth::check() && Auth::user()->role == 0)
                        <div class="alert alert-info d-flex flex-wrap align-items-center justify-content-between" role="alert">
                            <div class="mb-2 mb-md-0">
                                <i class="fas fa-info-circle me-2"></i>Anda telah login sebagai <b>{{ Auth::user()->name }}</b>
                            </div>
                            <a class="btn btn-primary" href="{{ route('member.index') }}">
                                <i class="fas fa-shopping-cart me-2"></i>Mulai Menyewa
                            </a>
                        </div>
                    @elseif (Auth::check() && Auth::user()->role != 0)
                        <div class="alert alert-info d-flex flex-wrap align-items-center justify-content-between" role="alert">
                            <div class="mb-2 mb-md-0">
                                <i class="fas fa-info-circle me-2"></i>Anda telah login sebagai Admin (<b>{{ Auth::user()->name }}</b>)
                            </div>
                            <a class="btn btn-primary" href="{{ route('admin.index') }}">
                                <i class="fas fa-cog me-2"></i>Halaman Admin
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <!-- Login Reminder -->
                            @if (!Auth::check())
                                <div class="alert alert-light border d-flex align-items-center mb-4" role="alert">
                                    <i class="fas fa-user-lock me-3 fs-4 text-primary"></i>
                                    <div>
                                        <a class="fw-bold text-decoration-none" href="#login">Login</a> untuk melakukan penyewaan secara online
                                    </div>
                                </div>
                            @endif

                            <!-- Category Filters -->
                            <div class="mb-4">
                                <h6 class="mb-3"><i class="fas fa-filter me-2"></i>Filter Kategori:</h6>
                                <div class="filter-container">
                                    <a class="btn {{ (request('kategori') == null) ? 'btn-primary' : 'btn-outline-secondary' }} filter-btn" 
                                       href="{{ route('member.index') }}">
                                        Semua
                                    </a>
                                    @foreach ($categories as $cat)
                                        <a class="btn {{ (request('kategori') == $cat->id) ? 'btn-primary' : 'btn-outline-secondary' }} filter-btn" 
                                           href="?kategori={{ $cat->id }}">
                                            {{ $cat->nama_kategori }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Search Box -->
                            <form action="">
                                <div class="input-group search-box">
                                    <input type="text" class="form-control search-input" placeholder="Cari peralatan..." name="search" 
                                           {{ (request()->get('search') != null) ? "value = ".request()->get('search')."" : "" }}>
                                    <button class="search-btn" type="submit">
                                        <i class="fas fa-search me-2"></i>Cari
                                    </button>
                                </div>
                            </form>
                            <div class="product-slider">
    @if(count($alats) > 0)
        <div class="swiper productSwiper">
            <div class="swiper-wrapper">
                @foreach ($alats as $alat)
                    <div class="swiper-slide">
                        <div class="card h-100 position-relative">
                            <span class="category-badge">{{ $alat->category->nama_kategori }}</span>
                            <img class="card-img-top" src="{{ url('') }}/images/{{ $alat->gambar }}" alt="{{ $alat->nama_alat }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $alat->nama_alat }}</h5>
                                <div class="d-flex justify-content-between align-items-center mt-3 mb-2">
                                    <span class="price-tag">@money($alat->harga24)</span>
                                    <span class="duration-badge">24 Jam</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                   
                                </div>
                                
                            </div>
                            <div class="card-footer bg-white border-0 pt-0">
                                <a href="{{ route('home.detail',['id' => $alat->id]) }}" class="btn btn-primary w-100">
                                    <i class="fas fa-info-circle me-2"></i>Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    @else
        <div class="text-center py-5">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h5>Tidak ada peralatan yang ditemukan</h5>
            <p class="text-muted">Coba gunakan kata kunci lain atau hapus filter</p>
        </div>
    @endif
</div>

                        </div>
                    </div>

                    <!-- Product Slider -->
                   
                </div>
            </div>
        </div>
    </section>

    <!-- Login Section -->
    @if (!Auth::check())
    <section id="login" class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="login-section">
                        <div class="row g-0"> 
                            <div class="col-md-6 p-4 p-lg-5">
                                <h3 class="section-title mb-4">Belum Punya Akun?</h3>
                                <p class="mb-4">Daftar sekarang dan nikmati kemudahan dalam melakukan reservasi peralatan fotografi secara online.</p>
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Reservasi online 24/7</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Riwayat penyewaan lengkap</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Notifikasi status pesanan</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Proses penyewaan lebih cepat</li>
                                </ul>
                                <a href="{{ route('daftar') }}" class="btn btn-primary">
                                    <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                                </a>
                            </div>
                            <div class="col-md-6 p-4 p-lg-5 border-start">
                                <h3 class="section-title mb-4">Login</h3>
                                @include('partials.login')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- About Section -->
    <section id="tentang" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <h2 class="section-title">Tentang Kami</h2>
                            <p class="mb-4">Bidz Kamera adalah penyedia jasa rental kamera dan peralatan fotografi terlengkap di Semarang. Kami menyediakan berbagai jenis kamera, lensa, dan aksesoris fotografi dengan harga terjangkau.</p>
                            <p>Dengan pengalaman lebih dari 5 tahun, kami berkomitmen untuk memberikan pelayanan terbaik dan peralatan berkualitas untuk memenuhi kebutuhan fotografi Anda.</p>
                        </div>
                        <div class="col-md-6">
                            <img src="https://images.unsplash.com/photo-1452780212940-6f5c0d14d848?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                                 alt="Tentang Bidzshoot" class="img-fluid rounded shadow">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-12 text-center mb-5">
                            <h2 class="section-title">Hubungi Kami</h2>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card contact-card text-center h-100 p-4">
                                <div class="card-body">
                                    <i class="fas fa-map-marker-alt contact-icon"></i>
                                    <h5 class="card-title">Alamat</h5>
                                    <p class="card-text">Jl. HR. Bunyamin No. 123, Semarang, Jawa Tengah</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card contact-card text-center h-100 p-4">
                                <div class="card-body">
                                    <i class="fas fa-phone-alt contact-icon"></i>
                                    <h5 class="card-title">Telepon</h5>
                                    <p class="card-text">+62 812 3456 7890</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card contact-card text-center h-100 p-4">
                                <div class="card-body">
                                    <i class="fas fa-envelope contact-icon"></i>
                                    <h5 class="card-title">Email</h5>
                                    <p class="card-text">Bidzshoot@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <h4 class="footer-title">Bidzshoot Kamera</h4>
                    <p class="mb-4">Penyedia jasa rental kamera dan peralatan fotografi terlengkap di Semarang dengan harga terjangkau dan kualitas terbaik.</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Tautan</h5>
                    <a href="#" class="footer-link">Beranda</a>
                    <a href="#katalog" class="footer-link">Katalog</a>
                    <a href="#tentang" class="footer-link">Tentang Kami</a>
                    <a href="#kontak" class="footer-link">Kontak</a>
                </div>
                <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Kategori</h5>
                    @foreach ($categories as $cat)
                        <a href="?kategori={{ $cat->id }}" class="footer-link">{{ $cat->nama_kategori }}</a>
                    @endforeach
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Jam Operasional</h5>
                    <p class="mb-1">Senin - Jumat: 08.00 - 20.00</p>
                    <p class="mb-1">Sabtu: 09.00 - 18.00</p>
                    <p>Minggu: 10.00 - 16.00</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center copyright">
                    <p>&copy; {{ date('Y') }} Blangshoot Kamera. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Initialize Swiper
        var swiper = new Swiper(".productSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 25,
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                }
            }
        });

        // Add smooth scrolling to all links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 70,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Add active class to current navigation item
        const currentLocation = location.href;
        const menuItems = document.querySelectorAll('.navbar-nav a');
        const menuLength = menuItems.length;
        for (let i = 0; i < menuLength; i++) {
            if (menuItems[i].href === currentLocation) {
                menuItems[i].classList.add('active');
            }
        }
    </script>
</body>
</html>