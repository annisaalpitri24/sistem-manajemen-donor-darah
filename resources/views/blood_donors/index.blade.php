<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendonor | Admin BloodCare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            padding: 30px;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            background-color: #fff;
        }

        .card-header {
            background-color: transparent;
            border-bottom: 1px solid #efefef;
            padding: 20px 25px;
        }

        .table {
            vertical-align: middle;
        }

        .table th {
            font-weight: 600;
            background-color: #f8f9fa;
            color: #555;
            border-bottom-width: 1px;
        }

        .badge-blood {
            background-color: #e53935;
            color: white;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .btn-action {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="main-container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">
                <i class="fa-solid fa-id-card text-danger me-2"></i> Kelola Data Pendonor
            </h2>
            <p class="text-muted m-0 small">Manajemen list pendonor darah pada sistem</p>
        </div>
        @if(Auth::user()->role == 'admin')
                <a href="admin/dashboard" class="btn btn-outline-secondary px-3 py-2 rounded-3 fw-medium">
                    <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Dashboard
                </a>
            @elseif(Auth::user()->role == 'petugas')
                <a href="petugas/dashboard" class="btn btn-outline-secondary px-3 py-2 rounded-3 fw-medium">
                    <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Dashboard
                </a>
            @else
                <a href="/" class="btn btn-outline-secondary px-3 py-2 rounded-3 fw-medium">
                    <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Home
                </a>
            @endif
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row g-3 align-items-center justify-content-between">
                
                <div class="col-md-5">
                    <form method="GET" action="{{ route('blood-donors.index') }}">
                        <div class="input-group">
                            <span class="input-group-text bg-light text-muted border-end-0">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input 
                                type="text"
                                name="search"
                                class="form-control bg-light border-start-0 ps-0"
                                placeholder="Cari nama atau golongan darah..."
                                value="{{ request('search') }}">
                            <button type="submit" class="btn btn-dark px-4">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-md-auto">
                    <a href="{{ route('blood-donors.create') }}" class="btn btn-danger px-4 py-2 rounded-3 fw-medium shadow-sm" style="background-color: #e53935;">
                        <i class="fa-solid fa-plus me-2"></i> Tambah Pendonor
                    </a>
                </div>

            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mx-0 my-0 px-3 align-middle">
                    <thead>
                        <tr class="px-3">
                            <th class="ps-4 py-3">Nama Lengkap</th>
                            <th class="py-3">Golongan Darah</th>
                            <th class="py-3">No. HP</th>
                            <th class="pe-4 py-3 text-end">Aksi / Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($donors as $donor)
                        <tr>
                            <td class="ps-4 fw-medium text-dark py-3">
                                <i class="fa-solid fa-user text-muted me-2 small"></i> {{ $donor->name }}
                            </td>
                            
                            <td class="py-3">
                                <span class="badge-blood">
                                    <i class="fa-solid fa-droplet me-1"></i> {{ $donor->blood_type }}
                                </span>
                            </td>
                            
                            <td class="text-secondary py-3">
                                <i class="fa-solid fa-phone text-muted me-2 small"></i> {{ $donor->phone }}
                            </td>

                            <td class="pe-4 text-end py-3">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('blood-donors.edit', $donor->id) }}" class="btn btn-light border btn-action text-primary">
                                        <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                    </a>

                                    <form action="{{ route('blood-donors.destroy', $donor->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light border btn-action text-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data pendonor ini?')">
                                            <i class="fa-solid fa-trash-can me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-folder-open d-block fs-2 mb-3 text-secondary"></i>
                                Data pendonor tidak ditemukan atau masih kosong.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>