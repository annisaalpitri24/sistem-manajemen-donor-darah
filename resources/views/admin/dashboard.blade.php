<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Sistem Donor Darah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
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
            width: 260px;
            background: linear-gradient(180deg, #1e1e2f 0%, #11111d 100%);
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }

        .sidebar-brand {
            padding: 20px;
            font-size: 1.2rem;
            font-weight: 600;
            color: #fff;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }

        .sidebar .nav-link {
            padding: 12px 25px;
            color: #b3b3b3;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: 0.2s;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: #fff;
            background: rgba(255, 255, 255, 0.05);
            border-left: 4px solid #e53935;
        }

        /* MAIN CONTENT STYLES */
        .main-content {
            margin-left: 260px;
            padding: 30px;
            min-height: 100vh;
        }

        /* TOPBAR STYLES */
        .topbar {
            background-color: #fff;
            padding: 15px 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* CUSTOM CARD STYLES */
        .stat-card {
            border: none;
            border-radius: 15px;
            padding: 20px;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.07);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card .card-icon {
            position: absolute;
            right: -10px;
            bottom: -15px;
            font-size: 5rem;
            opacity: 0.15;
        }

        .stat-card h3 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-card p {
            font-size: 0.95rem;
            margin: 0;
            opacity: 0.9;
        }

        /* CARD COLOR THEMES */
        .bg-gradient-red { background: linear-gradient(135deg, #e53935, #b71c1c); }
        .bg-gradient-blue { background: linear-gradient(135deg, #4e73df, #224abe); }
        .bg-gradient-green { background: linear-gradient(135deg, #1cc88a, #13855c); }
        .bg-gradient-purple { background: linear-gradient(135deg, #6f42c1, #4e259e); }
        .bg-gradient-orange { background: linear-gradient(135deg, #fd7e14, #d96101); }
        .bg-gradient-info { background: linear-gradient(135deg, #36b9cc, #258391); }

        .btn-logout {
            background-color: rgba(229, 57, 53, 0.1);
            color: #e53935;
            border: none;
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: 500;
            transition: 0.2s;
        }

        .btn-logout:hover {
            background-color: #e53935;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <i class="fa-solid fa-droplet text-danger me-2"></i> Admin BloodCare
    </div>
    <ul class="nav flex-column mt-4">
        <li class="nav-item">
            <a class="nav-link active" href="/dashboard">
                <i class="fa-solid fa-chart-pie"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/users">
                <i class="fa-solid fa-users-gear"></i> Manajemen User
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/blood-donors">
                <i class="fa-solid fa-id-card"></i> Data Pendonor
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/donations">
                <i class="fa-solid fa-hand-holding-medical"></i> Data Donasi
            </a>
        </li>
    </ul>
</div>

<div class="main-content">
    
    <div class="topbar">
        <div>
            <h5 class="m-0 text-muted">Selamat Datang kembali,</h5>
            <h4 class="m-0 fw-bold text-dark">{{ Auth::user()->name }}</h4>
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
        
        <div class="d-flex align-items-center mb-4">
            <h4 class="fw-bold text-dark m-0">Ringkasan Statistik</h4>
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

        <div class="d-flex align-items-center mb-4">
            <h4 class="fw-bold text-dark m-0">Statistik Pengguna Aplikasi</h4>
        </div>

        <div class="row g-4">
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

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>