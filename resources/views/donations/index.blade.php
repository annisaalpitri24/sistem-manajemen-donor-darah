<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Donasi | Admin BloodCare</title>

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
            max-width: 1300px;
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
            white-space: nowrap;
        }

        .table td {
            white-space: nowrap;
        }

        .badge-info-custom {
            background-color: #e3f2fd;
            color: #0d6efd;
            padding: 5px 10px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.85rem;
        }

        .btn-action {
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="main-container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold m-0 text-dark">
                    <i class="fa-solid fa-hand-holding-medical text-danger me-2"></i> Log & Data Donasi Darah
                </h2>
                <p class="text-muted m-0 small">Manajemen seluruh aktivitas dan rekam medis transaksi donor darah</p>
            </div>

            <div>
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
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="row g-3 align-items-center justify-content-between">

                    <div class="col-md-5">
                        <form method="GET" action="{{ route('donations.index') }}">
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted border-end-0">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <input
                                    type="text"
                                    name="search"
                                    class="form-control bg-light border-start-0 ps-0"
                                    placeholder="Cari nama pendonor..."
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn btn-dark px-4">
                                    Cari
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-auto">
                        <a href="{{ route('donations.create') }}" class="btn btn-danger px-4 py-2 rounded-3 fw-medium shadow-sm" style="background-color: #e53935;">
                            <i class="fa-solid fa-plus me-2"></i> Tambah Donasi Baru
                        </a>
                    </div>

                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mx-0 my-0 align-middle">
                        <thead>
                            <tr>
                                <th class="ps-4 py-3 text-center" style="width: 60px;">No</th>
                                <th class="py-3">Nama Pendonor</th>
                                <th class="py-3">Golongan Darah</th>
                                <th class="py-3">Tanggal Donasi</th>
                                <th class="py-3">Lokasi Kegiatan</th>
                                <th class="py-3">Jumlah (ml)</th>
                                <th class="py-3">Tekanan Darah</th>
                                <th class="py-3">Hemoglobin (Hb)</th>
                                <th class="py-3">Petugas Medis</th>
                                <th class="py-3">Status</th>
                                <th class="py-3">Catatan</th>

                                <th class="pe-4 py-3 text-center" style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($donations as $donation)
                            <tr>

                                <td class="ps-4 text-center text-muted fw-medium">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="fw-semibold text-dark">
                                    <i class="fa-solid fa-circle-user text-secondary me-2"></i>
                                    {{ $donation->donor->name }}
                                </td>
                                <td>
                                    <span class="badge bg-danger">
                                        {{ $donation->donor->blood_type }}
                                    </span>
                                </td>

                                <td>
                                    <i class="fa-regular fa-calendar text-muted me-1"></i>
                                    {{ date('d M Y', strtotime($donation->donation_date)) }}
                                </td>

                                <td>
                                    <i class="fa-solid fa-location-dot text-muted me-1"></i>
                                    {{ $donation->location }}
                                </td>

                                <td>
                                    <span class="badge bg-danger bg-opacity-10 text-danger fw-bold px-3 py-2">
                                        {{ $donation->amount_ml }} ml
                                    </span>
                                </td>

                                <td>
                                    <span class="badge bg-primary bg-opacity-10 text-primary fw-semibold px-3 py-2">
                                        {{ $donation->blood_pressure }}
                                    </span>
                                </td>

                                <td>
                                    <span class="badge bg-info bg-opacity-10 text-info fw-semibold px-3 py-2">
                                        {{ $donation->hemoglobin }} g/dL
                                    </span>
                                </td>

                                <td>
                                    <i class="fa-solid fa-user-nurse text-secondary me-1"></i>
                                    {{ $donation->officer_name }}
                                </td>

                                {{-- STATUS --}}
                                <td>

                                    @if($donation->status == 'diterima')

                                    <span class="badge rounded-pill bg-success px-3 py-2">
                                        <i class="fa-solid fa-circle-check me-1"></i>
                                        Diterima
                                    </span>

                                    @elseif($donation->status == 'ditolak')

                                    <span class="badge rounded-pill bg-danger px-3 py-2">
                                        <i class="fa-solid fa-circle-xmark me-1"></i>
                                        Ditolak
                                    </span>

                                    @else

                                    <span class="badge rounded-pill bg-secondary px-3 py-2">
                                        Belum Ada
                                    </span>

                                    @endif

                                </td>

                                {{-- CATATAN --}}
                                <td>

                                    @if($donation->notes)

                                    <span class="text-dark">
                                        {{ $donation->notes }}
                                    </span>

                                    @else

                                    <span class="text-muted fst-italic">
                                        -
                                    </span>

                                    @endif

                                </td>

                                <td class="pe-4 text-center">

                                    <div class="d-inline-flex gap-2">

                                        <a href="{{ route('donations.edit',$donation->id) }}"
                                            class="btn btn-warning btn-sm">

                                            <i class="fa-solid fa-pen"></i>

                                        </a>

                                        <form action="{{ route('donations.destroy',$donation->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus data ini?')">

                                                <i class="fa-solid fa-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="12" class="text-center py-5">

                                    <i class="fa-solid fa-circle-info fs-2 text-secondary"></i>

                                    <br><br>

                                    Belum ada data donasi.

                                </td>

                            </tr>

                            @endforelse

                        </tbody>
                    </table>
                    <div class="card-footer bg-white">
                        <div class="d-flex justify-content-center mt-3">
                            {{ $donations->withQueryString()->links() }}
                        </div>
                    </div>
                </div>

            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>