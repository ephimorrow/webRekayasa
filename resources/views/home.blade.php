@extends('layouts.app') 
{{--
    Catatan: File ini mengasumsikan Anda memiliki master layout
    di 'resources/views/layouts/app.blade.php'
    yang berisi struktur dasar HTML, tag <head>,
    dan menyertakan section 'styles' dan 'scripts'.
--}}

@section('title', 'Beranda - Regal Crimson')

{{-- Menambahkan link ke file CSS eksternal --}}
@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- MENGGUNAKAN HELPER ASSET() UNTUK MEMANGGIL FILE CSS KUSTOM --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

{{-- Struktur HTML Utama (Content) --}}
@section('content')

    {{-- Navbar (Bisa dipindahkan ke app.blade.php jika diperlukan) --}}
    <header class="navbar" id="main-navbar">
        <div class="logo-group">
            <div class="logo"><i class="fas fa-crown"></i></div>
            <h1>Regal Crimson</h1>
        </div>
        
        <nav class="nav-links" id="nav-links">
            {{-- Menggunakan route() helper jika sudah mendefinisikan route di web.php --}}
            <a href="#home"><i class="fas fa-home"></i> Home</a>
            <a href="#about"><i class="fas fa-info-circle"></i> About</a>
            <a href="#services"><i class="fas fa-briefcase"></i> Services</a>
        </nav>
        
        <div class="hamburger" id="hamburger-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </header>

    <main class="container">
        <!-- Alert -->
        <div class="alert alert-margin">
            📣 Selamat datang di **Regal Crimson** - Website dengan tema mewah dan elegan.
        </div>

        <!-- Hero Section (Home) -->
        <section class="hero-section" id="home">
            <div class="hero-content">
                <h1 class="hero-title">Kualitas Premium, Sentuhan Eksklusif.</h1>
                <p class="hero-subtitle">
                    Mengubah ambisi Anda menjadi realitas yang mewah dengan layanan konsultasi dan strategi yang tak tertandingi.
                </p>
                <div class="hero-actions">
                    <a href="#services" class="btn btn-crimson btn-large">Jelajahi Layanan Kami <i class="fas fa-arrow-right"></i></a>
                    <a href="#" class="btn btn-gold-outline btn-large">Hubungi Konsultan</a>
                </div>
            </div>
        </section>
        
        <!-- About Section -->
        <h2 id="about">Tentang Kami</h2>
        <p style="margin-bottom: 20px; color: #5d4f4c;">
            Kami adalah perusahaan yang berfokus pada penyediaan layanan premium dengan kualitas terbaik. Dengan pengalaman lebih dari 10 tahun, kami telah melayani berbagai klien dari berbagai industri, memastikan solusi yang elegan dan efektif untuk setiap kebutuhan bisnis. Kami berkomitmen pada keunggulan dan kepuasan klien.
        </p>
        
        <!-- Services Section -->
        <h2 id="services" class="h2-top-margin">Layanan Kami</h2>
        <div class="filters">
            <button class="filter-btn active" data-filter="all">Semua</button>
            <button class="filter-btn" data-filter="premium">Premium</button>
            <button class="filter-btn" data-filter="standard">Standar</button>
            <button class="filter-btn" data-filter="special">Khusus</button>
        </div>
        
        <div class="card-grid" id="services-grid">
            {{-- Konten layanan akan di-inject di sini oleh JavaScript --}}
        </div>
        
    </main>

    {{-- Footer (Bisa dipindahkan ke app.blade.php jika diperlukan) --}}
    <footer>
        &copy; {{ date('Y') }} Regal Crimson Theme. Didesain dengan sentuhan <a href="#">Elegance</a>.
    </footer>
@endsection

{{-- JavaScript tetap berada di section 'scripts' --}}
@section('scripts')
    <script>
        const navLinks = document.getElementById('nav-links');
        const hamburgerMenu = document.getElementById('hamburger-menu');
        const mainNavbar = document.getElementById('main-navbar');

        // --- MOCK DATA LOKAL (BUKAN DATABASE) ---
        const services = [
            { title: 'Konsultasi Strategis', description: 'Panduan ahli untuk pertumbuhan bisnis yang cepat.', type: 'premium', image: 'https://placehold.co/600x400/8B1A3D/FFFFFF?text=Strategi' },
            { title: 'Audit Keuangan', description: 'Analisis mendalam untuk memastikan kepatuhan dan efisiensi.', type: 'standard', image: 'https://placehold.co/600x400/BFA373/3E322F?text=Audit' },
            { title: 'Pelatihan Eksklusif', description: 'Program kustomisasi untuk tim eksekutif Anda.', type: 'premium', image: 'https://placehold.co/600x400/5C1128/FFFFFF?text=Pelatihan' },
            { title: 'Riset Pasar', description: 'Mengidentifikasi tren dan peluang pasar baru.', type: 'special', image: 'https://placehold.co/600x400/AA335A/FFFFFF?text=Riset' },
        ];
        
        // --- FUNGSI RENDERING DINAMIS ---

        function renderServices(data) {
            const grid = document.getElementById('services-grid');
            grid.innerHTML = data.map(service => {
                const btnClass = service.type === 'premium' ? 'btn-crimson' : 'btn-gold-outline';
                return `
                    <div class="seminar-card" data-type="${service.type}" style="display: flex;">
                        <img src="${service.image}" alt="${service.title}" onerror="this.onerror=null;this.src='https://placehold.co/600x400/bfa373/3e322f?text=Service';">
                        <div class="card-content">
                            <h3>${service.title}</h3>
                            <p>${service.description}</p>
                            <a href="#" class="btn ${btnClass}">Detail</a>
                        </div>
                    </div>
                `;
            }).join('');
        }

        // --- NAVBAR & SCROLL LOGIC ---

        // Logika untuk Hamburger Menu (3 Garis)
        hamburgerMenu.addEventListener('click', () => {
            navLinks.classList.toggle('open');
            hamburgerMenu.classList.toggle('active');
        });

        // Logika untuk Animasi Navbar saat Scroll
        window.addEventListener('scroll', () => {
            if (window.scrollY > 80) {
                mainNavbar.classList.add('scrolled');
            } else {
                mainNavbar.classList.remove('scrolled');
            }
        });

        // Menutup menu mobile ketika salah satu link diklik
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 900) { 
                    navLinks.classList.remove('open');
                    hamburgerMenu.classList.remove('active');
                }
            });
        });


        // --- FILTER FUNCTIONALITY ---
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Render data awal saat DOM siap
            renderServices(services);

            const filterBtns = document.querySelectorAll('.filter-btn');
            
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    const filter = this.getAttribute('data-filter');
                    
                    // Filter cards
                    document.querySelectorAll('.seminar-card').forEach(card => {
                        if (filter === 'all' || card.getAttribute('data-type') === filter) {
                            card.style.display = 'flex'; 
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
@endsection
