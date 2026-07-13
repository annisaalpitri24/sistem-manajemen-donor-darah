<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pendonor | Sistem Donor Darah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle at 10% 20%, rgb(255, 252, 252) 0%, rgb(255, 235, 235) 90%);
            font-family: 'Plus Jakarta Sans', sans-serif;
            padding: 40px 20px;
            color: #2d3748;
        }

        .register-card {
            width: 100%;
            max-width: 750px;
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(220, 53, 69, 0.06), 0 1px 3px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(220, 53, 69, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .header {
            background: linear-gradient(135deg, #fff5f5 0%, #ffe3e3 100%);
            text-align: center;
            padding: 40px 30px;
            border-bottom: 1px solid rgba(220, 53, 69, 0.08);
            position: relative;
        }

        .blood-icon-wrapper {
            width: 80px;
            height: 80px;
            background: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            box-shadow: 0 8px 20px rgba(220, 53, 69, 0.15);
        }

        .blood-icon {
            font-size: 38px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.08); }
            100% { transform: scale(1); }
        }

        .header h2 {
            margin: 0;
            font-weight: 700;
            color: #dc3545;
            font-size: 1.75rem;
            letter-spacing: -0.5px;
        }

        .header p {
            margin-top: 8px;
            color: #6c757d;
            font-size: 0.95rem;
            margin-bottom: 0;
        }

        .form-body {
            padding: 40px;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.88rem;
            color: #4a5568;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            padding: 12px 16px;
            border: 1.5px solid #e2e8f0;
            background-color: #f8fafc;
            font-size: 0.95rem;
            color: #334155;
            transition: all 0.2s ease-in-out;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #fff;
            border-color: #dc3545;
            box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.12);
            outline: 0;
        }

        .input-group-text {
            background-color: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            color: #64748b;
        }

        .btn-register {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            border: none;
            padding: 14px;
            font-weight: 600;
            border-radius: 12px;
            font-size: 1rem;
            box-shadow: 0 6px 18px rgba(220, 53, 69, 0.25);
            transition: all 0.2s ease;
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #c82333 0%, #bd2130 100%);
            transform: translateY(-1px);
            box-shadow: 0 8px 22px rgba(220, 53, 69, 0.3);
        }

        .btn-register:active {
            transform: translateY(1px);
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            font-size: 0.95rem;
            color: #64748b;
        }

        .login-link a {
            text-decoration: none;
            color: #dc3545;
            font-weight: 600;
            margin-left: 4px;
            transition: color 0.2s;
        }

        .login-link a:hover {
            color: #a71d2a;
            text-decoration: underline;
        }

        .alert {
            border-radius: 12px;
            border: none;
            font-size: 0.9rem;
        }
        
        .alert-danger {
            background-color: #fff5f5;
            color: #c53030;
        }

        .alert-success {
            background-color: #f0fff4;
            color: #22543d;
        }

        /* Responsive spacing */
        @media (max-width: 576px) {
            body { padding: 15px 10px; }
            .form-body { padding: 25px 20px; }
            .header { padding: 30px 20px; }
        }
    </style>
</head>

<body>

    <div class="register-card">

        <div class="header">
            <div class="blood-icon-wrapper">
                <div class="blood-icon">🩸</div>
            </div>
            <h2>Registrasi Pendonor</h2>
            <p>Bergabunglah menjadi pendonor darah dan bantu selamatkan nyawa</p>
        </div>

        <div class="form-body">

            @if(session('success'))
            <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i>
                <div>{{ session('success') }}</div>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger mb-4" role="alert">
                <div class="d-flex align-items-center mb-2 font-weight-bold">
                    <i class="fa-solid fa-circle-exclamation me-2"></i>
                    <span>Mohon periksa kesalahan berikut:</span>
                </div>
                <ul class="mb-0 ps-4">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="/register" method="POST">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3.5">
                        <label class="form-label">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nama lengkap Anda" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3.5">
                        <label class="form-label">Golongan Darah</label>
                        <select name="blood_type" class="form-select" required>
                            <option value="">Pilih Golongan Darah</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3.5 mt-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="gender" class="form-select" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="M">Laki-laki</option>
                            <option value="F">Perempuan</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3.5 mt-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="birth_date" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3.5 mt-3">
                        <label class="form-label">Nomor HP</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Contoh: 08123456xxx" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3.5 mt-3">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="nama@email.com" required>
                        </div>
                    </div>

                    <div class="col-12 mb-3.5 mt-3">
                        <label class="form-label">Alamat Rumah</label>
                        <textarea name="address" rows="3" class="form-control" placeholder="Tuliskan alamat lengkap tempat tinggal Anda...">{{ old('address') }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3.5 mt-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="******" required>
                        <div class="form-text text-muted mt-1.5" style="font-size: 0.8rem;">
                            <i class="fa-solid fa-info-circle me-1"></i> Minimal 6 karakter
                        </div>
                    </div>

                    <div class="col-md-6 mb-3.5 mt-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="******" required>
                    </div>

                    <div class="col-12 d-grid mt-4 pt-2">
                        <button type="submit" class="btn btn-danger btn-register">
                            <i class="fa-solid fa-paper-plane me-2"></i>Daftar Sekarang
                        </button>
                    </div>

                </div>
            </form>

            <div class="login-link">
                Sudah punya akun?
                <a href="/login">Login di sini</a>
            </div>

        </div>

    </div>

</body>
</html>