<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sistem Donor Darah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #de2c2c;
            --primary-dark: #991b1b;
            --gradient-start: #7f1d1d;
            --gradient-end: #dc2626;
            --bg-soft: #f8fafc;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at top right, var(--gradient-end) 0%, var(--gradient-start) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            position: relative;
            overflow-x: hidden;
        }

        /* Dekorasi Background Abstrak */
        body::before, body::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.03);
            z-index: 0;
        }
        body::before { top: -50px; left: -50px; }
        body::after { bottom: -50px; right: -50px; }

        .login-container {
            width: 100%;
            max-width: 430px;
            padding: 20px;
            z-index: 1;
        }

        .card {
            border: 1px solid rgba(255, 255, 255, 0.125);
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }

        .card-header {
            background: transparent;
            border-bottom: none;
            padding: 40px 40px 10px 40px;
        }

        .brand-logo {
            font-size: 55px;
            color: var(--primary-color);
            margin-bottom: 15px;
            display: inline-block;
            filter: drop-shadow(0 4px 6px rgba(229, 57, 53, 0.2));
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .card-header h3 {
            font-weight: 700;
            color: #1e293b;
            letter-spacing: -0.5px;
        }

        .card-body {
            padding: 20px 40px 40px 40px;
        }

        .btn-back {
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.2s ease;
            color: #64748b;
            border-color: #cbd5e1;
        }

        .btn-back:hover {
            background-color: #f1f5f9;
            color: #334155;
            border-color: #94a3b8;
            transform: translateX(-3px);
        }

        .form-label {
            font-weight: 500;
            color: #475569;
            font-size: 13.5px;
            margin-bottom: 8px;
        }

        .input-group {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
            transition: all 0.3s ease;
        }

        .input-group-text {
            background-color: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-right: none;
            color: #94a3b8;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control {
            border: 1.5px solid #e2e8f0;
            border-left: none;
            padding: 12px 15px 12px 0;
            font-size: 14.5px;
            color: #334155;
            font-weight: 400;
            transition: all 0.3s ease;
        }

        .form-control::placeholder {
            color: #cbd5e1;
        }

        /* Efek Focus Kolom Input Modern */
        .input-group:focus-within {
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.15);
        }

        .input-group:focus-within .input-group-text {
            border-color: var(--gradient-end);
            color: var(--gradient-end);
            background-color: #fff;
        }

        .input-group:focus-within .form-control {
            border-color: var(--gradient-end);
            background-color: #fff;
        }

        /* Alert Styling */
        .alert {
            border-radius: 12px;
            font-size: 14px;
            border: none;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--gradient-end) 0%, var(--primary-dark) 100%);
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 600;
            font-size: 15px;
            color: white;
            box-shadow: 0 4px 12px rgba(183, 28, 28, 0.25);
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, #4c0519 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(183, 28, 28, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .register-link {
            font-size: 14px;
        }

        .register-link a {
            color: var(--gradient-end);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .register-link a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-container">

        <div class="card" data-aos="fade-up" data-aos-duration="800">

            <div class="card-header text-center">
                <div class="brand-logo">
                    <i class="fa-solid fa-droplet"></i>
                </div>
                <h3>Selamat Datang</h3>
                <p class="text-muted small">Silakan login ke akun Donor Darah Anda</p>
            </div>

            <div class="card-body">

                <a href="/" class="btn btn-outline-secondary btn-sm btn-back mb-4">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-circle-exclamation me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                
                @if ($errors->any())
                <div class="alert alert-warning">
                    <ul class="mb-0 small">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="/login" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Alamat Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control"
                                placeholder="nama@email.com" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" class="form-control"
                                placeholder="••••••••" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-login w-100 mb-2">
                        <i class="fa-solid fa-right-to-bracket me-2"></i> Masuk
                    </button>

                </form>

                <div class="text-center register-link mt-4">
                    <span class="text-muted">Belum punya akun?</span>
                    <a href="/register">Daftar Sekarang</a>
                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inisialisasi library animasi AOS
        AOS.init({
            once: true
        });
    </script>
</body>

</html>