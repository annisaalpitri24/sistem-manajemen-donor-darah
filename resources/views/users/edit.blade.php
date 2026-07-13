<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <style>
        body{
            background: linear-gradient(135deg,#f8fafc,#eef2ff);
            font-family: 'Segoe UI', sans-serif;
        }

        .card-form{
            max-width:650px;
            margin:60px auto;
            border:none;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 15px 35px rgba(0,0,0,.12);
        }

        .card-header{
            background:linear-gradient(135deg,#0d6efd,#0a58ca);
            color:white;
            text-align:center;
            padding:30px;
        }

        .card-header i{
            font-size:55px;
            margin-bottom:10px;
        }

        .card-body{
            padding:35px;
        }

        .form-control,
        .form-select{
            border-radius:12px;
            padding:12px;
        }

        .form-control:focus,
        .form-select:focus{
            border-color:#0d6efd;
            box-shadow:0 0 10px rgba(13,110,253,.25);
        }

        label{
            font-weight:600;
            margin-bottom:8px;
        }

        .btn-primary,
        .btn-secondary{
            border-radius:12px;
            padding:12px;
            font-weight:600;
        }

        .alert{
            border-radius:12px;
        }

        .profile-icon{
            width:100px;
            height:100px;
            border-radius:50%;
            background:#fff;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:auto;
            color:#0d6efd;
            font-size:50px;
            box-shadow:0 5px 20px rgba(0,0,0,.15);
        }
    </style>

</head>

<body>

<div class="container">

    <div class="card card-form">

        <div class="card-header">

            <div class="profile-icon">
                <i class="fa-solid fa-user-pen"></i>
            </div>

            <h2 class="mt-3 mb-1">
                Edit User
            </h2>

            <small>Perbarui informasi pengguna</small>

        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        <i class="fa-solid fa-circle-exclamation"></i>
                        Terjadi Kesalahan
                    </strong>

                    <ul class="mt-2 mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="/users/{{ $user->id }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label>
                        <i class="fa-solid fa-user text-primary"></i>
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name',$user->name) }}"
                        required>

                </div>

                <div class="mb-3">

                    <label>
                        <i class="fa-solid fa-envelope text-primary"></i>
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email',$user->email) }}"
                        required>

                </div>

                <div class="mb-3">

                    <label>
                        <i class="fa-solid fa-lock text-primary"></i>
                        Password Baru
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Kosongkan jika tidak ingin mengganti password">

                    <small class="text-muted">
                        Password hanya diubah jika diisi.
                    </small>

                </div>

                <div class="mb-4">

                    <label>
                        <i class="fa-solid fa-users text-primary"></i>
                        Role
                    </label>

                    <select
                        name="role"
                        class="form-select"
                        required>

                        <option value="admin"
                            {{ $user->role == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="petugas"
                            {{ $user->role == 'petugas' ? 'selected' : '' }}>
                            Petugas
                        </option>

                        <option value="pendonor"
                            {{ $user->role == 'pendonor' ? 'selected' : '' }}>
                            Pendonor
                        </option>

                    </select>

                </div>

                <div class="d-grid gap-2">

                    <button type="submit" class="btn btn-primary">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Update User

                    </button>

                    <a href="/users" class="btn btn-secondary">

                        <i class="fa-solid fa-arrow-left"></i>

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>