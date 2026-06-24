<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Donor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Jadwal Donor Berikutnya</h2>

    <div class="card mt-4">
        <div class="card-body">

            <h5>Donasi Terakhir</h5>
            <p>{{ $lastDonation }}</p>

            <hr>

            <h5>Boleh Donor Lagi Pada</h5>
            <h3 class="text-success">
                {{ $nextDonation }}
            </h3>

        </div>
    </div>

    <a href="/pendonor/dashboard" class="btn btn-primary mt-3">
        Kembali ke Dashboard
    </a>

</div>

</body>
</html>