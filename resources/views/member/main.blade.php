<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Abidz Rental Kamera - Member Area">
    <meta name="author" content="Abidz Rental">
    <title>Bidzshoot</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon.png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- DataTables -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
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
            --sidebar-width: 250px;
            --topbar-height: 60px;
            --mobile-nav-height: 60px;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding-bottom: var(--mobile-nav-height);
            overflow-x: hidden;
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: var(--topbar-height);
            left: 0;
            width: var(--sidebar-width);
            height: calc(100vh - var(--topbar-height));
            background-color: white;
            border-right: 1px solid #e9ecef;
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
        }
        
        .sidebar-collapsed {
            left: calc(-1 * var(--sidebar-width));
        }
        
        .sidebar-nav {
            padding: 1rem 0;
        }
        
        .sidebar-heading {
            padding: 0.5rem 1.5rem;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #6c757d;
            font-weight: 600;
        }
        
        .sidebar-item {
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            color: var(--dark-color);
            text-decoration: none;
            border-left: 3px solid transparent;
            transition: all 0.2s ease;
        }
        
        .sidebar-item:hover {
            background-color: rgba(0, 0, 0, 0.03);
            color: var(--primary-color);
        }
        
        .sidebar-item.active {
            background-color: rgba(46, 134, 222, 0.1);
            color: var(--primary-color);
            border-left-color: var(--primary-color);
        }
        
        .sidebar-icon {
            margin-right: 0.75rem;
            width: 20px;
            text-align: center;
        }
        
        .sidebar-badge {
            margin-left: auto;
        }
        
        /* Topbar */
        .topbar {
            height: var(--topbar-height);
            background-color: white;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1001;
        }
        
        .topbar-brand {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--primary-color);
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        
        .topbar-brand img {
            height: 32px;
            margin-right: 0.75rem;
        }
        
        .topbar-toggler {
            background: none;
            border: none;
            color: #6c757d;
            margin-right: 1rem;
            cursor: pointer;
            display: none;
        }
        
        .topbar-nav {
            margin-left: auto;
            display: flex;
            align-items: center;
        }
        
        .topbar-nav-item {
            position: relative;
            margin-left: 1rem;
        }
        
        .topbar-nav-link {
            color: #6c757d;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 0.5rem;
            border-radius: 50%;
            transition: all 0.2s ease;
        }
        
        .topbar-nav-link:hover {
            background-color: rgba(0, 0, 0, 0.03);
            color: var(--primary-color);
        }
        
        .topbar-user {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        
        .topbar-user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-right: 0.75rem;
        }
        
        .topbar-user-info {
            display: flex;
            flex-direction: column;
        }
        
        .topbar-user-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--dark-color);
        }
        
        .topbar-user-role {
            font-size: 0.75rem;
            color: #6c757d;
        }
        
        /* Content */
        .content {
            margin-left: var(--sidebar-width);
            margin-top: var(--topbar-height);
            padding: 1.5rem;
            min-height: calc(100vh - var(--topbar-height));
            transition: all 0.3s ease;
        }
        
        .content-full {
            margin-left: 0;
        }
        
        /* Mobile Navigation */
        .mobile-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: var(--mobile-nav-height);
            background-color: white;
            border-top: 1px solid #e9ecef;
            display: none;
            z-index: 1000;
        }
        
        .mobile-nav-list {
            display: flex;
            height: 100%;
            padding: 0;
            margin: 0;
            list-style: none;
        }
        
        .mobile-nav-item {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .mobile-nav-link {
            color: #6c757d;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0.5rem;
            width: 100%;
            transition: all 0.2s ease;
        }
        
        .mobile-nav-link:hover, .mobile-nav-link.active {
            color: var(--primary-color);
        }
        
        .mobile-nav-icon {
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
        }
        
        .mobile-nav-text {
            font-size: 0.7rem;
        }
        
        /* Cards */
        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
            padding: 1rem 1.25rem;
        }
        
        .card-title {
            margin-bottom: 0;
            font-weight: 600;
        }
        
        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #1c75c8;
            border-color: #1c75c8;
        }
        
        /* Responsive */
        @media (max-width: 991.98px) {
            .sidebar {
                left: calc(-1 * var(--sidebar-width));
            }
            
            .sidebar-show {
                left: 0;
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            }
            
            .content {
                margin-left: 0;
            }
            
            .topbar-toggler {
                display: block;
            }
            
            .mobile-nav {
                display: block;
            }
            
            body {
                padding-bottom: var(--mobile-nav-height);
            }
        }
        
        @media (max-width: 767.98px) {
            .topbar-user-info {
                display: none;
            }
            
            .topbar {
                padding: 0 1rem;
            }
            
            .content {
                padding: 1rem;
            }
        }
        
        /* Utilities */
        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }
        
        .shadow {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }
        
        .rounded-circle {
            border-radius: 50% !important;
        }
        
        .bg-light {
            background-color: var(--light-color) !important;
        }
        
        .text-primary {
            color: var(--primary-color) !important;
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border-radius: 0.5rem;
        }
        
        .dropdown-item {
            padding: 0.5rem 1.5rem;
        }
        
        .dropdown-item:active {
            background-color: var(--primary-color);
        }
    </style>
</head>
<body>
    <!-- Topbar -->
    <header class="topbar shadow-sm">
        <button class="topbar-toggler" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        
        <a href="{{ route('member.index') }}" class="topbar-brand">
            <i class="fas fa-camera-retro"></i>
            <span class="ms-2">Bidzshoot</span>
        </a>
        
        <div class="topbar-nav">
            <div class="topbar-nav-item dropdown">
                <div class="topbar-user" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="topbar-user-avatar">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="topbar-user-info">
                        <div class="topbar-user-name">{{ Auth::user()->name }}</div>
                        <div class="topbar-user-role">Member</div>
                    </div>
                    <i class="fas fa-chevron-down ms-2 text-muted small"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ route('akun.pengaturan') }}">
                        <i class="fas fa-cog me-2 text-muted"></i>Pengaturan Akun
                    </a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt me-2 text-muted"></i>Logout
                    </a></li>
                </ul>
            </div>
        </div>
    </header>
    
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-nav">
            <div class="sidebar-heading">Menu Utama</div>
            
            <a href="{{ route('member.index') }}" class="sidebar-item {{ Route::is('member.index') ? 'active' : '' }}">
                <i class="fas fa-search sidebar-icon"></i>
                <span>Explore</span>
            </a>
            
            <a href="{{ route('member.index') }}#keranjang" class="sidebar-item" 
               onclick="$('#keranjang').delay(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100)">
                <i class="fas fa-shopping-cart sidebar-icon"></i>
                <span>Keranjang Anda</span>
                <span class="badge bg-primary rounded-pill sidebar-badge">{{ Auth::user()->cart->count() }}</span>
            </a>
            
            <a href="{{ route('order.show') }}" class="sidebar-item {{ Route::is('order.show') || Route::is('order.detail') ? 'active' : '' }}">
                <i class="fas fa-clipboard-list sidebar-icon"></i>
                <span>Reservasi Anda</span>
                <span class="badge bg-primary rounded-pill sidebar-badge">{{ Auth::user()->payment->count() }}</span>
            </a>
            
            <a href="{{ route('member.kalender') }}" class="sidebar-item {{ Route::is('member.kalender') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt sidebar-icon"></i>
                <span>Kalender</span>
            </a>
            
            <div class="sidebar-heading mt-4">Akun</div>
            
            <a href="{{ route('akun.pengaturan') }}" class="sidebar-item {{ Route::is('akun.pengaturan') ? 'active' : '' }}">
                <i class="fas fa-cog sidebar-icon"></i>
                <span>Pengaturan Akun</span>
            </a>
            
            <a href="{{ route('logout') }}" class="sidebar-item">
                <i class="fas fa-sign-out-alt sidebar-icon"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>
    
    <!-- Main Content -->
    <main class="content" id="content">
        @yield('container')
    </main>
    
    <!-- Mobile Navigation -->
    <nav class="mobile-nav shadow-sm">
        <ul class="mobile-nav-list">
            <li class="mobile-nav-item">
                <a href="{{ route('member.index') }}" class="mobile-nav-link {{ Route::is('member.index') ? 'active' : '' }}">
                    <i class="fas fa-search mobile-nav-icon"></i>
                    <span class="mobile-nav-text">Explore</span>
                </a>
            </li>
            <li class="mobile-nav-item">
                <a href="{{ route('member.index') }}#keranjang" class="mobile-nav-link" 
                   onclick="$('#keranjang').delay(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100)">
                    <i class="fas fa-shopping-cart mobile-nav-icon"></i>
                    <span class="mobile-nav-text">Keranjang</span>
                    @if(Auth::user()->cart->count() > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                            {{ Auth::user()->cart->count() }}
                        </span>
                    @endif
                </a>
            </li>
            <li class="mobile-nav-item">
                <a href="{{ route('order.show') }}" class="mobile-nav-link {{ Route::is('order.show') || Route::is('order.detail') ? 'active' : '' }}">
                    <i class="fas fa-clipboard-list mobile-nav-icon"></i>
                    <span class="mobile-nav-text">Reservasi</span>
                    @if(Auth::user()->payment->count() > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                            {{ Auth::user()->payment->count() }}
                        </span>
                    @endif
                </a>
            </li>
            <li class="mobile-nav-item">
                <a href="{{ route('member.kalender') }}" class="mobile-nav-link {{ Route::is('member.kalender') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt mobile-nav-icon"></i>
                    <span class="mobile-nav-text">Kalender</span>
                </a>
            </li>
        </ul>
    </nav>
    
    <!-- Scripts -->
    <script src="/js/datatables.js"></script>
    <script src="/js/adminscripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    
    <script>
        // Sidebar Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    if (window.innerWidth >= 992) {
                        // Desktop behavior
                        sidebar.classList.toggle('sidebar-collapsed');
                        content.classList.toggle('content-full');
                    } else {
                        // Mobile behavior
                        sidebar.classList.toggle('sidebar-show');
                    }
                });
            }
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                if (window.innerWidth < 992 && 
                    !sidebar.contains(event.target) && 
                    !sidebarToggle.contains(event.target) && 
                    sidebar.classList.contains('sidebar-show')) {
                    sidebar.classList.remove('sidebar-show');
                }
            });
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 992) {
                    sidebar.classList.remove('sidebar-show');
                } else {
                    sidebar.classList.remove('sidebar-collapsed');
                    content.classList.remove('content-full');
                }
            });
        });
    </script>
</body>
</html>