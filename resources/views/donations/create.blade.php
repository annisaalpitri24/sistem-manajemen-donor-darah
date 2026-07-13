<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Donasi Baru | BloodCare</title>

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
            max-width: 800px;
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

        .section-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #e53935;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 20px;
            margin-top: 10px;
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
                <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Log Donasi
            </button>
        </div>

        <div class="card">
            <div class="card-header d-flex align-items-center">
                <div class="bg-danger bg-opacity-10 text-danger p-3 rounded-3 me-3">
                    <i class="fa-solid fa-file-medical fs-4"></i>
                </div>
                <div>
                    <h4 class="fw-bold m-0 text-dark">Input Transaksi Donasi</h4>
                    <p class="text-muted m-0 small">Catat rekam medis pemeriksaan dan hasil donor darah baru</p>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('donations.store') }}" method="POST">
                    @csrf

                    <div class="section-title">
                        <i class="fa-solid fa-info-circle me-1"></i> Informasi Utama
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Pilih Pendonor</label>
                            <select name="donor_id" class="form-select" required>
                                <option value="" disabled selected>-- Cari & Pilih Nama Pendonor --</option>
                                @foreach($donors as $donor)
                                <option value="{{ $donor->id }}">
                                    {{ $donor->name }} ({{ $donor->blood_type }})
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Kegiatan</label>
                            <input type="date" name="donation_date" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Lokasi / Tempat</label>
                            <input type="text" name="location" class="form-control" placeholder="Contoh: Unit Donor Darah PMI" required>
                        </div>
                    </div>

                    <div class="section-title">
                        <i class="fa-solid fa-heart-pulse me-1"></i> Hasil Pemeriksaan Fisik & Medis
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jumlah Kantong Darah (ml)</label>
                            <div class="input-group">
                                <input type="number" name="amount_ml" class="form-control" value="450" required>
                                <span class="input-group-text bg-light text-muted">ml</span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Tekanan Darah (Tensi)</label>
                            <div class="input-group">
                                <input type="text" name="blood_pressure" class="form-control" placeholder="Contoh: 120/80" required>
                                <span class="input-group-text bg-light text-muted">mmHg</span>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kadar Hemoglobin (Hb)</label>
                            <div class="input-group">
                                <input type="number" step="0.1" name="hemoglobin" class="form-control" placeholder="Contoh: 13.5" required>
                                <span class="input-group-text bg-light text-muted">g/dL</span>
                            </div>
                        </div>
                    </div>

                    <div class="section-title">
                        <i class="fa-solid fa-user-nurse me-1"></i> Validasi Petugas
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Nama Petugas Medis / Pemeriksa</label>
                            <input type="text" name="officer_name" class="form-control" placeholder="Masukkan nama lengkap petugas" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Status Donor
                            </label>

                            <select name="status" class="form-select" required>
                                <option value="">Pilih Status</option>

                                <option value="diterima">
                                    ✅ Diterima
                                </option>

                                <option value="ditolak">
                                    ❌ Ditolak
                                </option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label class="form-label">Catatan Tambahan (Opsional)</label>
                            <textarea name="notes" class="form-control" rows="3" placeholder="Tuliskan catatan khusus atau kendala jika ada..."></textarea>
                        </div>
                    </div>

                    <hr class="text-muted opacity-25 mb-4">

                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" onclick="window.history.back();" class="btn btn-outline-secondary btn-cancel">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-save shadow-sm">
                            <i class="fa-solid fa-floppy-disk me-2"></i> Simpan Transaksi Donasi
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>