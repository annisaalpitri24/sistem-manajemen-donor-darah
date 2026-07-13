<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, .08);
        }

        .table th {
            background: #dc3545;
            color: white;
            text-align: center;
        }

        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <div class="card">

            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">

                <h4 class="mb-0">
                    <i class="fas fa-users"></i>
                    Manajemen User
                </h4>

                <div>

                    <a href="{{ route('users.create') }}"
                        class="btn btn-light me-2">
                        <i class="fas fa-plus"></i>
                        Tambah User
                    </a>

                    @if(Auth::user()->role == 'admin')
                    <a href="/admin/dashboard"
                        class="btn btn-warning">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                    @elseif(Auth::user()->role == 'petugas')
                    <a href="/petugas/dashboard"
                        class="btn btn-warning">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                    @endif

                </div>

            </div>

            <div class="card-body">

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <!-- FORM SEARCH -->
                <form action="{{ route('users.index') }}" method="GET">

                    <div class="input-group mb-3">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari nama, email, role..."
                            value="{{ request('search') }}">

                        <button class="btn btn-danger" type="submit">
                            <i class="fas fa-search"></i> Search
                        </button>

                        @if(request('search'))
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Reset
                        </a>
                        @endif

                    </div>

                </form>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th width="30%">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($users as $user)

                            <tr>

                                <td class="text-center">
                                    {{ $users->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    {{ $user->name }}
                                </td>

                                <td>
                                    {{ $user->email }}
                                </td>

                                <td class="text-center">

                                    @if($user->role == 'admin')
                                    <span class="badge bg-danger">
                                        Admin
                                    </span>
                                    @elseif($user->role == 'petugas')
                                    <span class="badge bg-primary">
                                        Petugas
                                    </span>
                                    @else
                                    <span class="badge bg-secondary">
                                        Pendonor
                                    </span>
                                    @endif

                                </td>

                                <td class="text-center">

                                    @if($user->status == 'pending')
                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>
                                    @else
                                    <span class="badge bg-success">
                                        Aktif
                                    </span>
                                    @endif

                                </td>

                                <td>

                                    <div class="d-flex gap-2 justify-content-center flex-wrap">

                                        @if($user->status == 'pending')

                                        <form action="{{ route('users.approve', $user->id) }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="from" value="users">

                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fas fa-check"></i>
                                                Setujui
                                            </button>
                                        </form>

                                        @endif

                                        <a href="{{ route('users.edit',$user->id) }}"
                                            class="btn btn-primary btn-sm">

                                            <i class="fas fa-edit"></i>
                                            Edit

                                        </a>

                                        <form action="{{ route('users.destroy',$user->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus user ini?')">

                                                <i class="fas fa-trash"></i>
                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="6" class="text-center">
                                    Tidak ada data user
                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-3">
                    {{ $users->withQueryString()->links() }}
                </div>

            </div>
        </div>

    </div>

</body>

</html>