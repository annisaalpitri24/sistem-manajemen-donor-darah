<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Sistem Donor Darah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-dark: #0f172a;
            --secondary-dark: #1e293b;
            --accent-red: #ef4444;
            --accent-red-hover: #dc2626;
            --bg-body: #f8fafc;
            --text-main: #334155;
            --sidebar-width: 270px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            overflow-x: hidden;
        }

        /* SIDEBAR STYLES */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 0;
            width: var(--sidebar-width);
            background: var(--primary-dark);
            box-shadow: 4px 0 25px rgba(15, 23, 42, 0.08);
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 25px 20px;
            font-size: 1.25rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: 0.5px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar .nav-item {
            margin: 4px 16px;
        }

        .sidebar .nav-link {
            padding: 12px 18px;
            color: #94a3b8;
            font-weight: 500;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 14px;
            border-radius: 10px;
            transition: all 0.25s ease;
        }

        .sidebar .nav-link i {
            font-size: 1.1rem;
            transition: transform 0.25s ease;
        }

        .sidebar .nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.04);
        }

        .sidebar .nav-link:hover i {
            transform: translateX(3px);
        }

        .sidebar .nav-link.active {
            color: #fff;
            background: var(--accent-red);
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .sidebar .nav-link.active:hover {
            background: var(--accent-red-hover);
        }

        /* MAIN CONTENT STYLES */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 40px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* TOPBAR STYLES */
        .topbar {
            background-color: #fff;
            padding: 20px 35px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(226, 232, 240, 0.8);
            margin-bottom: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* SECTION HEADING */
        .section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            position: relative;
            padding-left: 14px;
        }

        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 4px;
            bottom: 4px;
            width: 4px;
            background-color: var(--accent-red);
            border-radius: 2px;
        }

        /* CARD STYLES */
        .stat-card {
            border: none;
            border-radius: 20px;
            padding: 26px;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.04);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 145px;
        }

        .stat-card:hover {
            transform: translateY(-6px);
        }

        .stat-card .card-icon {
            position: absolute;
            right: -8px;
            bottom: -12px;
            font-size: 5.5rem;
            opacity: 0.12;
            transition: transform 0.3s ease;
        }

        .stat-card:hover .card-icon {
            transform: scale(1.1) rotate(-5deg);
        }

        .stat-card h3 {
            font-size: 2.4rem;
            font-weight: 800;
            margin: 0;
            line-height: 1;
            letter-spacing: -0.5px;
        }

        .stat-card p {
            font-size: 0.9rem;
            font-weight: 600;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            opacity: 0.85;
        }

        /* MODERN GRADIENTS */
        .bg-gradient-red {
            background: linear-gradient(135deg, #ff5858 0%, #f02fc2 100%);
            box-shadow: 0 10px 20px rgba(240, 47, 194, 0.2);
        }

        .bg-gradient-blue {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            box-shadow: 0 10px 20px rgba(0, 242, 254, 0.2);
        }

        .bg-gradient-green {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            box-shadow: 0 10px 20px rgba(56, 249, 215, 0.2);
            color: #1e293b !important;
        }

        .bg-gradient-green p {
            color: #334155;
        }

        .bg-gradient-green h3 {
            color: #0f172a;
        }

        .bg-gradient-green .card-icon {
            opacity: 0.08;
        }

        .bg-gradient-purple {
            background: linear-gradient(135deg, #b180fe 0%, #7042bf 100%);
            box-shadow: 0 10px 20px rgba(112, 66, 191, 0.2);
        }

        .bg-gradient-orange {
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
            box-shadow: 0 10px 20px rgba(253, 160, 133, 0.2);
            color: #1e293b !important;
        }

        .bg-gradient-orange p {
            color: #334155;
        }

        .bg-gradient-orange h3 {
            color: #0f172a;
        }

        .bg-gradient-orange .card-icon {
            opacity: 0.08;
        }

        .bg-gradient-info {
            background: linear-gradient(135deg, #abecd6 0%, #11998e 100%);
            box-shadow: 0 10px 20px rgba(17, 153, 142, 0.2);
        }

        /* BLOOD STOCK SPECIFIC STYLES */
        .blood-card {
            background: #fff;
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.01);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .blood-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.04);
        }

        .blood-type-badge {
            width: 50px;
            height: 50px;
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--accent-red);
            font-size: 1.3rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
        }

        .blood-info h3 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }

        .blood-info p {
            font-size: 0.8rem;
            color: #64748b;
            margin: 0;
            font-weight: 600;
            text-transform: uppercase;
        }

        /* LOGOUT BUTTON */
        .btn-logout {
            background-color: rgba(239, 68, 68, 0.08);
            color: var(--accent-red);
            border: 1px solid rgba(239, 68, 68, 0.15);
            padding: 10px 22px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.25s ease;
        }

        .btn-logout:hover {
            background-color: var(--accent-red);
            color: #fff;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
            transform: translateY(-1px);
        }

        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fa-solid fa-droplet text-danger me-2fs-4 me-2"></i> BloodCare <span class="fw-light ms-1" style="opacity: 0.7;">Admin</span>
        </div>
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a class="nav-link" href="/admin/profile">
                    <i class="fa-solid fa-user"></i> <span>Profil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/admin/dashboard">
                    <i class="fa-solid fa-chart-pie"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users">
                    <i class="fa-solid fa-users-gear"></i> <span>Manajemen User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/blood-donors">
                    <i class="fa-solid fa-id-card"></i> <span>Data Pendonor</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/donations">
                    <i class="fa-solid fa-hand-holding-medical"></i> <span>Data Donasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/reports">
                    <i class="fa-solid fa-file-pdf"></i> <span>Laporan</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">

        <div class="topbar">
            <div>
                <p class="m-0 text-muted small fw-medium">Selamat Datang kembali,</p>
                <h4 class="m-0 fw-bold text-dark mt-1">{{ Auth::user()->name }}</h4>
            </div>
            <div>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-logout">
                        <i class="fa-solid fa-sign-out-alt me-2"></i> Keluar
                    </button>
                </form>
            </div>
        </div>

        <div class="container-fluid p-0">

            <div class="mb-4">
                <h5 class="section-title">Ringkasan Statistik</h5>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-xl-4 col-md-6">
                    <div class="stat-card bg-gradient-red">
                        <i class="fa-solid fa-users card-icon"></i>
                        <p>Total Pendonor Terdaftar</p>
                        <h3>{{ $totalDonor }}</h3>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="stat-card bg-gradient-blue">
                        <i class="fa-solid fa-layer-group card-icon"></i>
                        <p>Total Transaksi Donasi</p>
                        <h3>{{ $totalDonasi }}</h3>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="stat-card bg-gradient-green">
                        <i class="fa-solid fa-user-check card-icon"></i>
                        <p>Pendonor Aktif</p>
                        <h3>{{ $donorAktif }}</h3>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <h5 class="section-title">Statistik Pengguna Aplikasi</h5>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-xl-4 col-md-6">
                    <div class="stat-card bg-gradient-purple">
                        <i class="fa-solid fa-user-shield card-icon"></i>
                        <p>Total Akun Pengguna</p>
                        <h3>{{ $totalUser }}</h3>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="stat-card bg-gradient-orange">
                        <i class="fa-solid fa-user-tie card-icon"></i>
                        <p>Total Admin</p>
                        <h3>{{ $totalAdmin }}</h3>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="stat-card bg-gradient-info">
                        <i class="fa-solid fa-user-nurse card-icon"></i>
                        <p>Total Petugas Lapangan</p>
                        <h3>{{ $totalPetugas }}</h3>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <h5 class="section-title">Ringkasan Stok Darah (Kantong)</h5>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>