<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pendonor | Admin BloodCare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            padding: 40px 15px;
        }

        .form-container {
            max-width: 750px;
            margin: 0 auto;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            background-color: #fff;
        }

        .card-header {
            background-color: transparent;
            border-bottom: 1px solid #efefef;
            padding: 25px 30px;
        }

        .card-body {
            padding: 30px;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 10px 15px;
            font-size: 0.9rem;
            border: 1px solid #ced4da;
            transition: all 0.2s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #e53935;
            box-shadow: 0 0 0 0.25rem rgba(229, 57, 53, 0.15);
        }

        .btn-save {
            background-color: #e53935;
            color: white;
            border: none;
            padding: 11px 25px;
            border-radius: 10px;
            font-weight: 500;
            transition: 0.2s;
        }

        .btn-save:hover {
            background-color: #b71c1c;
            color: white;
            box-shadow: 0 4px 12px rgba(183, 28, 28, 0.2);
        }

        .btn-cancel {
            border-radius: 10px;
            padding: 11px 25px;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="form-container">

        <div class="mb-3">
            <button type="button" onclick="window.history.back();" class="btn btn-link text-secondary text-decoration-none p-0 fw-medium">
                <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Daftar Pendonor
            </button>
        </div>

        <div class="card">
            <div class="card-header d-flex align-items-center">
                <div class="bg-danger bg-opacity-10 text-danger p-3 rounded-3 me-3">
                    <i class="fa-solid fa-user-plus fs-4"></i>
                </div>
                <div>
                    <h4 class="fw-bold m-0 text-dark">Tambah Pendonor Baru</h4>
                    <p class="text-muted m-0 small">Masukkan informasi data medis dan kontak pendonor</p>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('blood-donors.store') }}" method="POST">
                    @csrf

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Golongan Darah</label>
                            <select name="blood_type" class="form-select" required>
                                <option value="" disabled selected>Pilih Golongan Darah</option>
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
                            <select name="gender" class="form-select" required>
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="M">Laki-laki</option>
                                <option value="F">Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="birth_date" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">No. Handphone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Contoh: 08123456xxx" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Alamat Email</label>
                            <input type="email"
                                name="email"
                                class="form-control"
                                placeholder="nama@email.com"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Password</label>
                            <input type="password"
                                name="password"
                                class="form-control"
                                placeholder="Masukkan password"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Ulangi password"
                                required>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label class="form-label">Alamat Rumah</label>
                            <textarea name="address"
                                class="form-control"
                                rows="3"
                                placeholder="Tuliskan alamat lengkap tempat tinggal saat ini..."
                                required></textarea>
                        </div>

                        <hr class="text-muted opacity-25 mb-4">

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" onclick="window.history.back();" class="btn btn-outline-secondary btn-cancel">
                                Batal
                            </button>
                            <button type="submit" class="btn btn-save shadow-sm">
                                <i class="fa-solid fa-floppy-disk me-2"></i> Simpan Data Pendonor
                            </button>
                        </div>

                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>