<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sistem Donor Darah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #b71c1c 0%, #e53935 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 15px;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            background: #ffffff;
        }

        .card-header {
            background: transparent;
            border-bottom: none;
            padding-top: 40px;
            padding-bottom: 10px;
        }

        .brand-logo {
            font-size: 50px;
            color: #e53935;
            margin-bottom: 10px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .card-header h3 {
            font-weight: 600;
            color: #333;
        }

        .card-body {
            padding: 30px 40px 40px 40px;
        }

        .form-label {
            font-weight: 500;
            color: #555;
            font-size: 14px;
        }

        .input-group-text {
            background-color: #f8f9fa;
            border-color: #ced4da;
            color: #a0a0a0;
            border-radius: 10px 0 0 10px;
        }

        .form-control {
            border-radius: 0 10px 10px 0;
            padding: 10px 12px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #e53935;
            box-shadow: 0 0 0 0.25rem rgba(229, 57, 53, 0.15);
        }

        .btn-login {
            background: linear-gradient(135deg, #e53935 0%, #b71c1c 100%);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 500;
            font-size: 16px;
            color: white;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #b71c1c 0%, #800000 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(183, 28, 28, 0.4);
        }

        .register-link a {
            color: #e53935;
            text-decoration: none;
            font-weight: 500;
            transition: 0.2s;
        }

        .register-link a:hover {
            color: #b71c1c;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-container">

        <div class="card" data-aos="fade-up">

            <div class="card-header text-center">
                <div class="brand-logo">
                    <i class="fa-solid fa-droplet"></i>
                </div>
                <h3>Selamat Datang</h3>
                <p class="text-muted small">Silakan login ke akun Donor Darah Anda</p>
            </div>

            <div class="card-body">

                <!-- Tombol Kembali -->
                <a href="/" class="btn btn-outline-secondary btn-sm mb-3">
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
                    <ul class="mb-0">
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

                    <button type="submit" class="btn btn-login w-100 mb-3">
                        <i class="fa-solid fa-right-to-bracket me-2"></i> Masuk
                    </button>

                </form>

                <div class="text-center register-link mt-4">
                    <span class="text-muted small">Belum punya akun?</span>
                    <a href="/register" class="small">Daftar Sekarang</a>
                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>