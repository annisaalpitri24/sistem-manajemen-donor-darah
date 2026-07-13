<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Donasi Darah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
        }

        h2 {
            font-weight: bold;
        }

        .table th {
            background: #dc3545;
            color: white;
        }
    </style>

</head>

<body>

    <div class="container mt-5">

        <div class="card">

            <div class="card-header bg-danger text-white">

                <h2>
                    Laporan Donasi Darah
                </h2>

            </div>

            <div class="card-body">
                <div>
                    @if(Auth::user()->role == 'admin')
                    <a href="{{ url('/admin/dashboard') }}" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Kembali ke Dashboard
                    </a>

                    @elseif(Auth::user()->role == 'petugas')
                    <a href="{{ url('/petugas/dashboard') }}" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Kembali ke Dashboard
                    </a>

                    @else
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Kembali ke Home
                    </a>
                    @endif
                </div>

                {{-- FORM TAMPILKAN --}}
                <form method="GET" action="{{ route('reports.index') }}">

                    <div class="row">

                        <div class="col-md-3">

                            <label class="form-label">
                                Jenis Laporan
                            </label>

                            <select
                                name="type"
                                id="type"
                                class="form-control">

                                <option value="harian"
                                    {{ request('type')=='harian' ? 'selected' : '' }}>
                                    Harian
                                </option>

                                <option value="bulanan"
                                    {{ request('type')=='bulanan' ? 'selected' : '' }}>
                                    Bulanan
                                </option>

                                <option value="tahunan"
                                    {{ request('type')=='tahunan' ? 'selected' : '' }}>
                                    Tahunan
                                </option>

                            </select>

                        </div>

                        <div class="col-md-3">

                            <label class="form-label">
                                Tanggal
                            </label>

                            <input
                                type="date"
                                id="tanggal"
                                name="tanggal"
                                class="form-control"
                                value="{{ request('tanggal') }}">

                        </div>

                        <div class="col-md-6 d-flex align-items-end">

                            <button type="submit" class="btn btn-danger me-2">

                                Tampilkan

                            </button>

                        </div>

                    </div>

                </form>

                <br>

                {{-- FORM CETAK PDF --}}
                <form action="{{ route('reports.pdf') }}"
                    method="GET"
                    id="pdfForm"
                    target="_blank">

                    <input type="hidden" name="type" id="pdf_type">

                    <input type="hidden" name="tanggal" id="pdf_tanggal">

                    <button type="submit" class="btn btn-success">

                        <i class="fa fa-file-pdf"></i>

                        Cetak PDF

                    </button>

                </form>

                <hr>

                <table class="table table-bordered table-striped">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Nama Pendonor</th>
                            <th>Golongan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Jumlah</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($donations as $donation)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $donation->donor->name ?? '-' }}</td>

                            <td>{{ $donation->donor->blood_type ?? '-' }}</td>

                            <td>{{ $donation->donation_date }}</td>

                            <td>

                                @if($donation->status=="diterima")

                                <span class="badge bg-success">

                                    Diterima

                                </span>

                                @else

                                <span class="badge bg-danger">

                                    Ditolak

                                </span>

                                @endif

                            </td>

                            <td>

                                {{ $donation->amount_ml }} ml

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6" class="text-center">

                                Tidak ada data

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <script>
        document.getElementById('pdfForm').addEventListener('submit', function() {

            document.getElementById('pdf_type').value =
                document.getElementById('type').value;

            document.getElementById('pdf_tanggal').value =
                document.getElementById('tanggal').value;

        });
    </script>

</body>

</html>