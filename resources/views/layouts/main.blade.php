<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Akademik')</title>
    <style>
        /* --- RESET & BASE --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #0f0f1a;
            color: #e0e0e0;
            min-height: 100vh;
            padding-bottom: 80px; /* Padding agar konten tidak tertutup Bottom Nav */
        }

        /* --- TAMPILAN NAVBAR MODERN (GLASSMORPHISM) --- */
        .top-nav {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(22, 33, 62, 0.6); 
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 1rem 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(124, 58, 237, 0.15);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .top-nav .brand {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.5rem;
            font-weight: 800;
            text-decoration: none;
            letter-spacing: 0.5px;
        }

        .top-nav .brand .text-gradient {
            background: linear-gradient(135deg, #a78bfa 0%, #d8b4fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-item {
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            position: relative;
            padding: 0.5rem 0;
            transition: color 0.3s ease;
        }

        .nav-item:hover {
            color: #ffffff;
            text-shadow: 0 0 10px rgba(167, 139, 250, 0.5);
        }

        .nav-item::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background: #a78bfa;
            transition: width 0.3s ease;
            border-radius: 2px;
            box-shadow: 0 0 8px #a78bfa;
        }

        .nav-item:hover::after,
        .nav-item.active::after {
            width: 100%;
        }

        .nav-item.active {
            color: #ffffff;
            font-weight: 600;
        }

        .nav-btn {
            background: linear-gradient(135deg, #7c3aed 0%, #5b21b6 100%);
            color: #ffffff !important;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.2);
        }

        .nav-btn::after {
            display: none; 
        }

        .nav-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(124, 58, 237, 0.4);
            background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
        }

        /* --- LAYOUT UTAMA & KOMPONEN --- */
        .container {
            max-width: 1100px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .card {
            background: #1a1a2e;
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid #2d2d4e;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.4);
        }

        h1, h2 {
            color: #a78bfa;
            margin-bottom: 1.2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th {
            background: #7c3aed;
            color: #fff;
            padding: 0.8rem 1rem;
            text-align: left;
        }

        td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #2d2d4e;
        }

        tr:hover td {
            background: #16213e;
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            text-decoration: none;
            transition: opacity 0.2s;
        }

        .btn:hover { opacity: 0.85; }
        .btn-primary { background: #7c3aed; color: #fff; }
        .btn-success { background: #059669; color: #fff; }
        .btn-warning { background: #d97706; color: #fff; }
        .btn-danger { background: #dc2626; color: #fff; }

        input, select {
            width: 100%;
            padding: 0.6rem 0.9rem;
            border-radius: 8px;
            border: 1px solid #4c1d95;
            background: #0f0f1a;
            color: #e0e0e0;
            margin-top: 0.3rem;
            margin-bottom: 1rem;
        }

        label {
            font-size: 0.9rem;
            color: #a78bfa;
        }

        .alert {
            padding: 0.8rem 1.2rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            background: #065f46;
            color: #6ee7b7;
            border: 1px solid #059669;
        }

        .badge {
            display: inline-block;
            padding: 0.2rem 0.7rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .badge-purple { background: #4c1d95; color: #c4b5fd; }
        .badge-green { background: #064e3b; color: #6ee7b7; }
        .badge-red { background: #7f1d1d; color: #fca5a5; }

        .search-bar {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .search-bar input {
            margin: 0;
            flex: 1;
        }

        /* --- BOTTOM NAV & PAGINATION --- */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(26, 26, 46, 0.95);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: space-around;
            padding: 0.8rem 0;
            border-top: 1px solid #7c3aed;
            box-shadow: 0 -2px 20px rgba(0,0,0,0.5);
            z-index: 1000;
        }

        .bottom-nav a {
            color: #888;
            text-decoration: none;
            font-size: 0.75rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: 0.3s;
        }

        .bottom-nav a i {
            font-size: 1.2rem;
            margin-bottom: 4px;
        }

        .bottom-nav a.active, .bottom-nav a:hover {
            color: #a78bfa;
        }

        .pagination-wrapper {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #2d2d4e;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .pagination-wrapper svg, .pagination svg {
            width: 20px;
            height: 20px;
            display: inline;
        }

        .pagination nav div:first-child {
            margin-bottom: 10px;
            color: #888;
            font-size: 0.9rem;
        }

        .pagination nav div:last-child {
            display: flex;
            gap: 5px;
            align-items: center;
        }

        .pagination {
            margin-top: 1rem;
            display: flex;
            gap: 0.3rem;
        }

        .pagination a, .pagination span {
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            background: #2d2d4e;
            color: #a78bfa;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .pagination .active span {
            background: #7c3aed;
            color: #fff;
        }

        /* Responsivitas untuk layar HP */
        @media (max-width: 600px) {
            .pagination-wrapper nav div:first-child { display: none; }
            .top-nav { flex-direction: column; gap: 1rem; padding: 1rem; }
            .nav-links { gap: 1rem; flex-wrap: wrap; justify-content: center; }
        }
    </style>
</head>

<body>
    <nav class="top-nav">
        <a href="/" class="brand">
            <span>📚</span>
            <span class="text-gradient">Sistem Akademik</span>
        </a>

        <div class="nav-links">
            <a href="/siswa" class="nav-item {{ request()->is('siswa*') ? 'active' : '' }}">
                Data Siswa
            </a>
            <a href="/siswa/nilai" class="nav-item {{ request()->is('siswa/nilai*') ? 'active' : '' }}">
                Nilai Siswa
            </a>
            
            <a href="/nilai/create" class="nav-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                Tambah Nilai
            </a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>

</html>