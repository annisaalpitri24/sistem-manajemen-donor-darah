<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pendonor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .sidebar{
            width:250px;
            height:100vh;
            position:fixed;
            left:0;
            top:0;
            background:#dc3545;
            color:white;
        }

        .sidebar a{
            color:white;
            text-decoration:none;
            display:block;
            padding:15px 20px;
        }

        .sidebar a:hover{
            background:rgba(255,255,255,.1);
        }

        .content{
            margin-left:250px;
            padding:30px;
        }

        .card-stat{
            border:none;
            border-radius:15px;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
        }

        .welcome-box{
            background:white;
            border-radius:15px;
            padding:25px;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
        }
    </style>
</head>
<body>

<div class="sidebar">

    <h4 class="text-center mt-4">
        <i class="fa-solid fa-heart-circle-plus"></i>
        BloodCare
    </h4>

    <hr>

    <a href="/pendonor/dashboard">
        <i class="fa-solid fa-house"></i>
        Dashboard
    </a>

    <a href="/pendonor/profil">
        <i class="fa-solid fa-user"></i>
        Profil Saya
    </a>

    <a href="/pendonor/riwayat">
        <i class="fa-solid fa-clock-rotate-left"></i>
        Riwayat Donor
    </a>

    <a href="/pendonor/jadwal">
        <i class="fa-solid fa-calendar"></i>
        Jadwal Donor
    </a>

    <form action="/logout" method="POST" class="mt-4 px-3">
        @csrf
        <button class="btn btn-light w-100">
            Logout
        </button>
    </form>

</div>

<div class="content">

    <div class="welcome-box mb-4">
        <h3>
            Selamat Datang,
            {{ Auth::user()->name }}
        </h3>

        <p class="text-muted">
            Terima kasih telah menjadi pendonor darah.
        </p>
    </div>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card card-stat">
                <div class="card-body text-center">

                    <h1 class="text-danger">
                        {{ $totalDonasi ?? 0 }}
                    </h1>

                    <h5>Total Donasi</h5>

                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card card-stat">
                <div class="card-body text-center">

                    <h5>
                        {{ $lastDonation ?? '-' }}
                    </h5>

                    <p>Donasi Terakhir</p>

                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card card-stat">
                <div class="card-body text-center">

                    <h5 class="text-success">
                        {{ $nextDonation ?? '-' }}
                    </h5>

                    <p>Boleh Donor Lagi</p>

                </div>
            </div>
        </div>

    </div>

    <div class="card mt-4">
        <div class="card-header">
            Riwayat Donor Terbaru
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Jumlah</th>
                    <th>Status</th>

                </tr>

                @forelse($donations ?? [] as $donation)

                <tr>
                    <td>{{ $donation->donation_date }}</td>
                    <td>{{ $donation->location }}</td>
                    <td>{{ $donation->amount_ml }} ml</td>
                    <td>
                        @if($donation->status == 'diterima')
                            <span class="badge bg-success">
                                Diterima
                            </span>
                        @elseif($donation->status == 'ditolak')
                            <span class="badge bg-danger">
                                Ditolak
                            </span>
                        @else
                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>
                        @endif
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="4" class="text-center">
                        Belum ada riwayat donor
                    </td>
                </tr>

                @endforelse

            </table>

        </div>
    </div>

</div>

</body>
</html>