<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas | BloodCare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            overflow-x: hidden;
        }

        /* Layout Sidebar */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #1a1d20;
            color: #fff;
            padding-top: 20px;
            z-index: 100;
        }

        .main-content {
            margin-left: 260px;
            padding: 40px;
            min-height: 100vh;
        }

        /* Menu Navigasi */
        .nav-link-custom {
            display: flex;
            align-items: center;
            padding: 12px 25px;
            color: #bdc6d0;
            text-decoration: none;
            transition: all 0.3s;
            font-weight: 500;
            border-left: 4px solid transparent;
        }

        .nav-link-custom:hover, .nav-link-custom.active {
            color: #fff;
            background-color: rgba(255,255,255,0.05);
            border-left-color: #e53935;
        }

        .nav-link-custom i {
            width: 25px;
            font-size: 1.1rem;
        }

        /* Card Statistik Modern */
        .card-stat {
            border: none;
            border-radius: 15px;
            padding: 25px;
            background: #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .card-stat .icon-box {
            font-size: 2.5rem;
            opacity: 0.2;
            position: absolute;
            right: 20px;
            bottom: 15px;
        }

        /* Card Stok Darah Grid */
        .blood-card {
            border: none;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.02);
            text-align: center;
            padding: 20px;
            transition: transform 0.2s, box-shadow 0.2s;
            border-bottom: 4px solid #e53935;
        }

        .blood-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
        }

        .blood-type-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #e53935;
            background-color: rgba(229, 57, 53, 0.08);
            width: 55px;
            height: 55px;
            line-height: 55px;
            border-radius: 50%;
            margin: 0 auto 12px;
        }

        .btn-logout {
            background: transparent;
            border: none;
            color: #e53a3ae7;
            width: 100%;
            text-align: left;
            padding: 12px 25px;
            display: flex;
            align-items: center;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background-color: rgba(229, 57, 53, 0.1);
        }
    </style>
</head>
<body>

<div class="sidebar d-flex flex-column justify-content-between">
    <div>
        <div class="px-4 py-3 mb-4 d-flex align-items-center border-bottom border-secondary border-opacity-25">
            <i class="fa-solid fa-droplet text-danger fs-3 me-2"></i>
            <span class="fs-4 fw-bold tracking-wide text-white">BloodCare</span>
        </div>

        <div class="small text-uppercase px-4 mb-2 text-muted fw-semibold">Menu Petugas</div>
        <nav class="nav flex-column">
            <a href="#" class="nav-link-custom active">
                <i class="fa-solid fa-gauge-high me-2"></i> Dashboard
            </a>
            <a href="/blood-donors" class="nav-link-custom">
                <i class="fa-solid fa-id-card me-2"></i> Data Pendonor
            </a>
            <a href="/donations" class="nav-link-custom">
                <i class="fa-solid fa-hand-holding-medical me-2"></i> Data Donasi
            </a>
        </nav>
    </div>

    <div class="mb-4 border-top border-secondary border-opacity-25 pt-3">
        <form action="/logout" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn-logout">
                <i class="fa-solid fa-right-from-bracket me-3"></i> Keluar / Logout
            </button>
        </form>
    </div>
</div>

<div class="main-content">
    
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold m-0 text-dark">Dashboard Utama</h2>
            <p class="text-muted m-0">Selamat Datang kembali, <span class="fw-semibold text-dark">{{ Auth::user()->name }}</span> 👋</p>
        </div>
        <div class="bg-white px-3 py-2 rounded-3 shadow-sm d-flex align-items-center">
            <div class="bg-success rounded-circle me-2" style="width: 10px; height: 10px;"></div>
            <span class="small fw-medium text-secondary">Aktivitas Petugas Terpantau</span>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card-stat">
                <div>
                    <p class="text-muted mb-1 small fw-medium text-uppercase">Total Pendonor</p>
                    <h2 class="fw-bold text-dark m-0">{{ $totalDonor }}</h2>
                </div>
                <div class="icon-box text-primary">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-stat">
                <div>
                    <p class="text-muted mb-1 small fw-medium text-uppercase">Pendonor Aktif</p>
                    <h2 class="fw-bold text-success m-0">{{ $donorAktif }}</h2>
                </div>
                <div class="icon-box text-success">
                    <i class="fa-solid fa-user-check"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-stat">
                <div>
                    <p class="text-muted mb-1 small fw-medium text-uppercase">Total Log Donasi</p>
                    <h2 class="fw-bold text-danger m-0">{{ $totalDonasi }}</h2>
                </div>
                <div class="icon-box text-danger">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center mb-4">
        <h4 class="fw-bold m-0 text-dark me-2">Stok Kantong Darah Terkini</h4>
        <div class="flex-grow-1 border-bottom border-muted opacity-25"></div>
    </div>

    <div class="row g-3">
        <div class="col-6 col-sm-4 col-md-3">
            <div class="blood-card">
                <div class="blood-type-title">A+</div>
                <p class="text-muted small mb-1">Ketersediaan</p>
                <h3 class="fw-bold text-dark m-0">{{ $stokA_plus }} <span class="fs-6 text-secondary fw-normal">Pcs</span></h3>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3">
            <div class="blood-card">
                <div class="blood-type-title">A-</div>
                <p class="text-muted small mb-1">Ketersediaan</p>
                <h3 class="fw-bold text-dark m-0">{{ $stokA_minus }} <span class="fs-6 text-secondary fw-normal">Pcs</span></h3>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3">
            <div class="blood-card">
                <div class="blood-type-title">B+</div>
                <p class="text-muted small mb-1">Ketersediaan</p>
                <h3 class="fw-bold text-dark m-0">{{ $stokB_plus }} <span class="fs-6 text-secondary fw-normal">Pcs</span></h3>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3">
            <div class="blood-card">
                <div class="blood-type-title">B-</div>
                <p class="text-muted small mb-1">Ketersediaan</p>
                <h3 class="fw-bold text-dark m-0">{{ $stokB_minus }} <span class="fs-6 text-secondary fw-normal">Pcs</span></h3>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3">
            <div class="blood-card">
                <div class="blood-type-title">O+</div>
                <p class="text-muted small mb-1">Ketersediaan</p>
                <h3 class="fw-bold text-dark m-0">{{ $stokO_plus }} <span class="fs-6 text-secondary fw-normal">Pcs</span></h3>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3">
            <div class="blood-card">
                <div class="blood-type-title">O-</div>
                <p class="text-muted small mb-1">Ketersediaan</p>
                <h3 class="fw-bold text-dark m-0">{{ $stokO_minus }} <span class="fs-6 text-secondary fw-normal">Pcs</span></h3>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3">
            <div class="blood-card">
                <div class="blood-type-title">AB+</div>
                <p class="text-muted small mb-1">Ketersediaan</p>
                <h3 class="fw-bold text-dark m-0">{{ $stokAB_plus }} <span class="fs-6 text-secondary fw-normal">Pcs</span></h3>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3">
            <div class="blood-card">
                <div class="blood-type-title">AB-</div>
                <p class="text-muted small mb-1">Ketersediaan</p>
                <h3 class="fw-bold text-dark m-0">{{ $stokAB_minus }} <span class="fs-6 text-secondary fw-normal">Pcs</span></h3>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>