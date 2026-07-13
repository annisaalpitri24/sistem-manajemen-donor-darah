<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Petugas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f6f9;
            font-family:'Poppins',sans-serif;
        }

        .profile-card{

            max-width:650px;
            margin:60px auto;
            border:none;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,.1);

        }

        .profile-header{

            background:linear-gradient(135deg,#0d6efd,#084298);
            color:white;
            padding:40px;
            text-align:center;

        }

        .profile-header i{

            font-size:80px;
            margin-bottom:15px;

        }

        .profile-body{

            padding:35px;

        }

        .info-item{

            display:flex;
            justify-content:space-between;
            border-bottom:1px solid #eee;
            padding:12px 0;

        }

        .info-item:last-child{

            border:none;

        }

        .label{

            font-weight:600;
            color:#555;

        }

        .value{

            color:#222;

        }

    </style>

</head>
<body>

<div class="container">

    <div class="card profile-card">

        <div class="profile-header">

            <i class="fa-solid fa-user-nurse"></i>

            <h3>{{ Auth::user()->name }}</h3>

            <p class="mb-0">Petugas Sistem Donor Darah</p>

        </div>

        <div class="profile-body">

            <div class="info-item">
                <span class="label">Nama</span>
                <span class="value">{{ Auth::user()->name }}</span>
            </div>

            <div class="info-item">
                <span class="label">Email</span>
                <span class="value">{{ Auth::user()->email }}</span>
            </div>

            <div class="info-item">
                <span class="label">Role</span>
                <span class="value">{{ ucfirst(Auth::user()->role) }}</span>
            </div>

            <div class="info-item">
                <span class="label">Status</span>
                <span class="value">
                    <span class="badge bg-success">
                        {{ ucfirst(Auth::user()->status) }}
                    </span>
                </span>
            </div>

            <div class="info-item">
                <span class="label">Tanggal Bergabung</span>
                <span class="value">
                    {{ Auth::user()->created_at->format('d F Y') }}
                </span>
            </div>

            <div class="text-center mt-4">

                <a href="/petugas/dashboard" class="btn btn-secondary">

                    <i class="fa-solid fa-arrow-left me-2"></i>

                    Kembali ke Dashboard

                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>