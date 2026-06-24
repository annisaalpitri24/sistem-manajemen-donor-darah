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
            background: #f4f6f9;
            padding: 30px;
        }

        .main-container {
            max-width: 1200px;
            margin: auto;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .05);
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #eee;
        }

        .badge-blood {
            background: #e53935;
            color: white;
            padding: 6px 12px;
            border-radius: 8px;
        }

        .btn-action {
            border-radius: 8px;
            padding: 6px 12px;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold"> <i class="fa-solid fa-id-card text-danger"></i> Kelola Data Pendonor </h2>
                <p class="text-muted"> Manajemen list pendonor darah pada sistem </p>
            </div> @if(Auth::user()->role == 'admin') <a href="/admin/dashboard" class="btn btn-outline-secondary"> <i class="fa-solid fa-arrow-left"></i> Dashboard </a> @elseif(Auth::user()->role == 'petugas') <a href="/petugas/dashboard" class="btn btn-outline-secondary"> <i class="fa-solid fa-arrow-left"></i> Dashboard </a> @endif
        </div> @if(session('success')) <div class="alert alert-success"> {{ session('success') }} </div> @endif <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <form method="GET" action="{{ route('blood-donors.index') }}">
                            <div class="input-group"> <input type="text" name="search" class="form-control" placeholder="Cari nama pendonor..." value="{{ request('search') }}"> <button class="btn btn-dark"> Cari </button> </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-end"> <a href="{{ route('blood-donors.create') }}" class="btn btn-danger"> <i class="fa-solid fa-plus"></i> Tambah Pendonor </a> </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Nama Lengkap</th>
                            <th>Golongan Darah</th>
                            <th>No HP</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody> @forelse($donors as $donor) <tr>
                            <td class="ps-4"> {{ $donor->name }} </td>
                            <td> <span class="badge-blood"> {{ $donor->blood_type }} </span> </td>
                            <td> {{ $donor->phone }} </td>
                            <td> @if($donor->user && $donor->user->status == 'pending') <span class="badge bg-warning text-dark"> Pending </span> @else <span class="badge bg-success"> Aktif </span> @endif </td>
                            <td class="text-end pe-4"> @if($donor->user && $donor->user->status == 'pending') <form action="{{ route('users.approve',$donor->user->id) }}" method="POST" style="display:inline"> @csrf <button class="btn btn-success btn-action"> <i class="fa-solid fa-check"></i> Setujui </button> </form> @endif <a href="{{ route('blood-donors.edit',$donor->id) }}" class="btn btn-primary btn-action"> <i class="fa-solid fa-pen"></i> Edit </a>
                                <form action="{{ route('blood-donors.destroy',$donor->id) }}" method="POST" style="display:inline"> @csrf @method('DELETE') <button class="btn btn-danger btn-action" onclick="return confirm('Yakin hapus data?')"> <i class="fa-solid fa-trash"></i> Hapus </button> </form>
                            </td>
                        </tr> @empty <tr>
                            <td colspan="5" class="text-center text-muted py-4"> Belum ada data pendonor </td>
                        </tr> @endforelse </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>