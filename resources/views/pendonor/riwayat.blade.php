<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Donor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
            padding:30px;
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
            margin-bottom:30px;
        }

        .card-header{
            font-weight:bold;
            font-size:18px;
        }
    </style>
</head>
<body>

<div class="container">

    <h2 class="mb-4 text-center">
        🩸 Riwayat Donor Saya
    </h2>

    {{-- DONOR DITERIMA --}}
    <div class="card">

        <div class="card-header bg-success text-white">
            Donor Diterima
        </div>

        <div class="card-body p-0">

            <table class="table table-bordered table-hover mb-0">

                <thead class="table-success">
                <tr>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Catatan</th>
                </tr>
                </thead>

                <tbody>

                @php
                    $diterima = false;
                @endphp

                @foreach($donations as $donation)

                    @if($donation->status == 'diterima')

                    @php
                        $diterima = true;
                    @endphp

                    <tr>

                        <td>{{ $donation->donation_date }}</td>

                        <td>{{ $donation->location }}</td>

                        <td>{{ $donation->amount_ml }} ml</td>

                        <td>
                            <span class="badge bg-success">
                                Diterima
                            </span>
                        </td>

                        <td>{{ $donation->notes }}</td>

                    </tr>

                    @endif

                @endforeach

                @if(!$diterima)

                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Belum ada donor yang diterima.
                    </td>
                </tr>

                @endif

                </tbody>

            </table>

        </div>

    </div>



    {{-- DONOR DITOLAK --}}
    <div class="card">

        <div class="card-header bg-danger text-white">
            Donor Ditolak
        </div>

        <div class="card-body p-0">

            <table class="table table-bordered table-hover mb-0">

                <thead class="table-danger">
                <tr>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Catatan</th>
                </tr>
                </thead>

                <tbody>

                @php
                    $ditolak = false;
                @endphp

                @foreach($donations as $donation)

                    @if($donation->status == 'ditolak')

                    @php
                        $ditolak = true;
                    @endphp

                    <tr>

                        <td>{{ $donation->donation_date }}</td>

                        <td>{{ $donation->location }}</td>

                        <td>{{ $donation->amount_ml }} ml</td>

                        <td>
                            <span class="badge bg-danger">
                                Ditolak
                            </span>
                        </td>

                        <td>{{ $donation->notes }}</td>

                    </tr>

                    @endif

                @endforeach

                @if(!$ditolak)

                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Belum ada donor yang ditolak.
                    </td>
                </tr>

                @endif

                </tbody>

            </table>

        </div>

    </div>


    <a href="/pendonor/dashboard" class="btn btn-secondary">
        ← Kembali ke Dashboard
    </a>

</div>

</body>
</html>