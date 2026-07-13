<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas | BloodCare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-red: #dc3545;
            --primary-hover: #b02a37;
            --bg-light: #f8f9fa;
            --sidebar-bg: #111418;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --radius-lg: 16px;
            --radius-md: 12px;
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            overflow-x: hidden;
            letter-spacing: -0.01em;
        }

        /* Layout Sidebar */
        .sidebar {
            width: 280px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: var(--sidebar-bg);
            color: #fff;
            padding: 24px 16px;
            z-index: 100;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.05);
        }

        .main-content {
            margin-left: 280px;
            padding: 40px 48px;
            min-height: 100vh;
        }

        /* Menu Navigasi */
        .nav-link-custom {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #94a3b8;
            text-decoration: none;
            transition: var(--transition-smooth);
            font-weight: 600;
            font-size: 0.925rem;
            border-radius: var(--radius-md);
            margin-bottom: 6px;
        }

        .nav-link-custom i {
            width: 24px;
            font-size: 1.1rem;
            margin-right: 12px;
            transition: var(--transition-smooth);
        }

        .nav-link-custom:hover,
        .nav-link-custom.active {
            color: #fff;
            background-color: rgba(220, 53, 69, 0.1);
            color: #ff4d5e;
        }

        .nav-link-custom.active {
            background-color: var(--primary-red);
            color: #fff !important;
        }

        /* Card Statistik Modern */
        .card-stat {
            border: 1px solid rgba(0, 0, 0, 0.03);
            border-radius: var(--radius-lg);
            padding: 24px;
            background: #fff;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.02), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            transition: var(--transition-smooth);
        }

        .card-stat:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
        }

        .card-stat .icon-wrapper {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        /* Soft Backgrounds for Stats Icon */
        .bg-soft-primary { background-color: rgba(13, 110, 253, 0.08); color: #0d6efd; }
        .bg-soft-success { background-color: rgba(25, 135, 84, 0.08); color: #198754; }
        .bg-soft-danger { background-color: rgba(220, 53, 69, 0.08); color: #dc3545; }

        /* Card Stok Darah Grid */
        .blood-card {
            border: 1px solid rgba(0, 0, 0, 0.04);
            border-radius: var(--radius-lg);
            background: #fff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.01);
            text-align: center;
            padding: 24px 16px;
            transition: var(--transition-smooth);
            position: relative;
        }

        .blood-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-red);
            border-radius: var(--radius-lg) var(--radius-lg) 0 0;
            opacity: 0.7;
            transition: var(--transition-smooth);
        }

        .blood-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.06);
        }

        .blood-card:hover::before {
            opacity: 1;
            height: 6px;
        }

        .blood-type-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary-red);
            background-color: rgba(220, 53, 69, 0.06);
            width: 60px;
            height: 60px;
            line-height: 60px;
            border-radius: 50%;
            margin: 0 auto 16px;
            box-shadow: inset 0 2px 4px rgba(220, 53, 69, 0.1);
        }

        /* Logout Button */
        .btn-logout {
            background: transparent;
            border: none;
            color: #f87171;
            width: 100%;
            text-align: left;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            font-weight: 600;
            font-size: 0.925rem;
            border-radius: var(--radius-md);
            transition: var(--transition-smooth);
        }

        .btn-logout:hover {
            background-color: rgba(248, 113, 113, 0.1);
            color: #ef4444;
        }

        /* Responsive Fixes */
        @media (max-width: 991.98px) {
            .sidebar {
                width: 80px;
                padding: 24px 8px;
                align-items: center;
            }
            .sidebar .fs-4, .sidebar .small, .sidebar span {
                display: none;
            }
            .nav-link-custom {
                justify-content: center;
                padding: 12px;
            }
            .nav-link-custom i {
                margin-right: 0;
            }
            .main-content {
                margin-left: 80px;
                padding: 30px 20px;
            }
            .btn-logout {
                justify-content: center;
                padding: 12px;
            }
            .btn-logout i {
                margin-right: 0 !important;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar d-flex flex-column justify-content-between">
        <div class="w-100">
            <div class="px-3 py-2 mb-4 d-flex align-items-center border-bottom border-secondary border-opacity-10 justify-content-lg-start justify-content-center">
                <i class="fa-solid fa-droplet text-danger fs-3 me-lg-2"></i>
                <span class="fs-4 fw-bold tracking-wide text-white">BloodCare</span>
            </div>

            <div class="small text-uppercase px-3 mb-3 text-muted fw-bold" style="font-size: 0.75rem; letter-spacing: 0.05em;">Menu Petugas</div>
            <nav class="nav flex-column">
                <a class="nav-link-custom" href="/petugas/profile">
                    <i class="fa-solid fa-user"></i> <span>Profil</span>
                </a>
                <a href="#" class="nav-link-custom active">
                    <i class="fa-solid fa-gauge-high"></i> <span>Dashboard</span>
                </a>
                <a href="/blood-donors" class="nav-link-custom">
                    <i class="fa-solid fa-id-card"></i> <span>Data Pendonor</span>
                </a>
                <a href="/donations" class="nav-link-custom">
                    <i class="fa-solid fa-hand-holding-medical"></i> <span>Data Donasi</span>
                </a>
                <a class="nav-link-custom" href="/reports">
                    <i class="fa-solid fa-chart-pie"></i> <span>Laporan</span>
                </a>
            </nav>
        </div>

        <div class="w-100 border-top border-secondary border-opacity-10 pt-3">
            <form action="/logout" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fa-solid fa-right-from-bracket me-lg-3"></i> <span>Keluar / Logout</span>
                </button>
            </form>
        </div>
    </div>

    <div class="main-content">

        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-5 gap-3">
            <div>
                <h2 class="fw-extrabold m-0 text-dark" style="font-weight: 800; letter-spacing: -0.02em;">Dashboard Utama</h2>
                <p class="text-muted m-0 mt-1">Selamat Datang kembali, <span class="fw-bold text-dark">{{ Auth::user()->name }}</span> 👋</p>
            </div>
            <div class="bg-white px-3 py-2 rounded-3 shadow-sm d-flex align-items-center border border-light">
                <div class="bg-success rounded-circle me-2 animate-pulse" style="width: 8px; height: 8px;"></div>
                <span class="small fw-semibold text-secondary" style="font-size: 0.85rem;">Aktivitas Petugas Terpantau</span>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card-stat">
                    <div>
                        <p class="text-muted mb-1 small fw-bold text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Total Pendonor</p>
                        <h2 class="fw-bold text-dark m-0" style="font-weight: 700;">{{ $totalDonor }}</h2>
                    </div>
                    <div class="icon-wrapper bg-soft-primary">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-stat">
                    <div>
                        <p class="text-muted mb-1 small fw-bold text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Pendonor Aktif</p>
                        <h2 class="fw-bold text-success m-0" style="font-weight: 700;">{{ $donorAktif }}</h2>
                    </div>
                    <div class="icon-wrapper bg-soft-success">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-stat">
                    <div>
                        <p class="text-muted mb-1 small fw-bold text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Total Log Donasi</p>
                        <h2 class="fw-bold text-danger m-0" style="font-weight: 700;">{{ $totalDonasi }}</h2>
                    </div>
                    <div class="icon-wrapper bg-soft-danger">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center mb-4">
            <h4 class="fw-bold m-0 text-dark me-3" style="font-weight: 700; letter-spacing: -0.01em;">Stok Kantong Darah Terkini</h4>
            <div class="flex-grow-1 border-bottom border-2 border-light"></div>
        </div>

        <div class="row g-4">
            <div class="col-6 col-sm-4 col-md-3">
                <div class="blood-card">
                    <div class="blood-type-title">A+</div>
                    <p class="text-muted small mb-1 fw-medium">Ketersediaan</p>
                    <h3 class="fw-bold text-dark m-0">{{ $stokA_plus }} <span class="fs-6 text-muted fw-normal">Pcs</span></h3>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
                <div class="blood-card">
                    <div class="blood-type-title">A-</div>
                    <p class="text-muted small mb-1 fw-medium">Ketersediaan</p>
                    <h3 class="fw-bold text-dark m-0">{{ $stokA_minus }} <span class="fs-6 text-muted fw-normal">Pcs</span></h3>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
                <div class="blood-card">
                    <div class="blood-type-title">B+</div>
                    <p class="text-muted small mb-1 fw-medium">Ketersediaan</p>
                    <h3 class="fw-bold text-dark m-0">{{ $stokB_plus }} <span class="fs-6 text-muted fw-normal">Pcs</span></h3>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
                <div class="blood-card">
                    <div class="blood-type-title">B-</div>
                    <p class="text-muted small mb-1 fw-medium">Ketersediaan</p>
                    <h3 class="fw-bold text-dark m-0">{{ $stokB_minus }} <span class="fs-6 text-muted fw-normal">Pcs</span></h3>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
                <div class="blood-card">
                    <div class="blood-type-title">O+</div>
                    <p class="text-muted small mb-1 fw-medium">Ketersediaan</p>
                    <h3 class="fw-bold text-dark m-0">{{ $stokO_plus }} <span class="fs-6 text-muted fw-normal">Pcs</span></h3>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
                <div class="blood-card">
                    <div class="blood-type-title">O-</div>
                    <p class="text-muted small mb-1 fw-medium">Ketersediaan</p>
                    <h3 class="fw-bold text-dark m-0">{{ $stokO_minus }} <span class="fs-6 text-muted fw-normal">Pcs</span></h3>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
                <div class="blood-card">
                    <div class="blood-type-title">AB+</div>
                    <p class="text-muted small mb-1 fw-medium">Ketersediaan</p>
                    <h3 class="fw-bold text-dark m-0">{{ $stokAB_plus }} <span class="fs-6 text-muted fw-normal">Pcs</span></h3>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
                <div class="blood-card">
                    <div class="blood-type-title">AB-</div>
                    <p class="text-muted small mb-1 fw-medium">Ketersediaan</p>
                    <h3 class="fw-bold text-dark m-0">{{ $stokAB_minus }} <span class="fs-6 text-muted fw-normal">Pcs</span></h3>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>