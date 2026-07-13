<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <style>
        body{
            background: linear-gradient(135deg,#f8fafc,#eef2ff);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Segoe UI, sans-serif;
        }

        .profile-card{
            width:420px;
            background:#fff;
            border-radius:20px;
            box-shadow:0 15px 40px rgba(0,0,0,.12);
            overflow:hidden;
        }

        .profile-header{
            background:linear-gradient(135deg,#dc3545,#b71c1c);
            padding:35px;
            text-align:center;
            color:white;
        }

        .profile-header img{
            width:110px;
            height:110px;
            border-radius:50%;
            border:5px solid white;
            object-fit:cover;
            background:white;
        }

        .profile-body{
            padding:30px;
        }

        .info-box{
            background:#f8f9fa;
            border-radius:12px;
            padding:15px 20px;
            margin-bottom:15px;
        }

        .info-box h6{
            color:#6c757d;
            margin-bottom:5px;
        }

        .info-box p{
            margin:0;
            font-size:17px;
            font-weight:600;
        }

        .btn-custom{
            border-radius:10px;
            padding:10px;
            font-weight:600;
        }
    </style>

</head>

<body>

<div class="profile-card">

    <div class="profile-header">

        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ffffff&color=dc3545&size=200">

        <h3 class="mt-3">{{ Auth::user()->name }}</h3>

        <small>Pendonor</small>

    </div>

    <div class="profile-body">

        <div class="info-box">
            <h6>
                <i class="fa-solid fa-user text-danger"></i>
                Nama Lengkap
            </h6>

            <p>{{ Auth::user()->name }}</p>
        </div>

        <div class="info-box">
            <h6>
                <i class="fa-solid fa-envelope text-danger"></i>
                Email
            </h6>

            <p>{{ Auth::user()->email }}</p>
        </div>

        <div class="d-grid gap-2 mt-4">

            <a href="/pendonor/dashboard" class="btn btn-danger btn-custom">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali ke Dashboard
            </a>

        </div>

    </div>

</div>

</body>
</html>