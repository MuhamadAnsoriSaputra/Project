<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project PBL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar" class="bg-primary text-white p-3 vh-100 shadow" style="width: 240px;">
        <h4 class="text-center fw-bold mb-4">📘 Project PBL</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dosen.dashboard') }}" class="nav-link text-white {{ request()->is('dosen/dashboard') ? 'active-link' : '' }}">
                    🏠 Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dosen.matakuliah.index') }}" class="nav-link text-white {{ request()->is('dosen/matakuliah*') ? 'active-link' : '' }}">
                    📖 Mata Kuliah
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dosen.teknik.index') }}" class="nav-link text-white {{ request()->is('dosen/teknik*') ? 'active-link' : '' }}">
                    🛠 Teknik Penilaian
                </a>
            </li>
        </ul>
    </div>

    <!-- Konten Utama -->
    <div class="flex-grow-1 p-4 bg-light">
        <div class="card p-4 shadow-sm border-0">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
