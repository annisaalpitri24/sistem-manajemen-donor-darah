<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pendonor | Sistem Donor Darah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #dc3545, #b71c1c);
            font-family: 'Segoe UI', sans-serif;
            padding: 20px;
        }

        .register-card {
            width: 100%;
            max-width: 700px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .2);
            overflow: hidden;
        }

        .header {
            background: #dc3545;
            color: white;
            text-align: center;
            padding: 30px;
        }

        .header h2 {
            margin: 0;
            font-weight: bold;
        }

        .header p {
            margin-top: 10px;
            opacity: .9;
        }

        .form-body {
            padding: 30px;
        }

        .btn-register {
            background: #dc3545;
            border: none;
            padding: 12px;
            font-weight: 600;
        }

        .btn-register:hover {
            background: #b71c1c;
        }

        .blood-icon {
            font-size: 55px;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
        }

        .login-link a {
            text-decoration: none;
            color: #dc3545;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
        }
    </style>

</head>

<body>

    <div class="register-card">

        <div class="header">
            <div class="blood-icon">🩸</div>
            <h2>Registrasi Pendonor</h2>
            <p>Bergabunglah menjadi pendonor darah dan bantu selamatkan nyawa</p>
        </div>

        <div class="form-body">

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="/register" method="POST">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-control"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Golongan Darah</label>
                        <select name="blood_type"
                            class="form-select"
                            required>
                            <option value="">Pilih</option>
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

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="gender"
                            class="form-select"
                            required>
                            <option value="">Pilih</option>
                            <option value="M">Laki-laki</option>
                            <option value="F">Perempuan</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date"
                            name="birth_date"
                            class="form-control"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nomor HP</label>
                        <input type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            class="form-control"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control"
                            required>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="address"
                            rows="3"
                            class="form-control">{{ old('address') }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Password</label>
                        <input type="password"
                            name="password"
                            class="form-control"
                            required>
                        <small class="text-muted">
                            Minimal 6 karakter
                        </small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password"
                            name="password_confirmation"
                            class="form-control"
                            required>
                    </div>

                    <div class="col-12 d-grid mt-3">
                        <button type="submit"
                            class="btn btn-danger btn-register">
                            Daftar Sekarang
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