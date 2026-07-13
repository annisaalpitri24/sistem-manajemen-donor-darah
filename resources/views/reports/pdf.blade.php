<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <style>
        body{
            font-family: DejaVu Sans;
            font-size:12px;
            color:#333;
            margin:30px;
        }

        .header{
            text-align:center;
            border-bottom:3px solid #c62828;
            padding-bottom:10px;
            margin-bottom:20px;
        }

        .header h2{
            margin:0;
            color:#c62828;
            font-size:22px;
        }

        .header p{
            margin:3px;
            font-size:12px;
        }

        .info{
            width:100%;
            border:1px solid #999;
            margin-bottom:20px;
        }

        .info td{
            padding:8px;
            border:none;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th{
            background:#c62828;
            color:white;
            border:1px solid #555;
            padding:8px;
        }

        td{
            border:1px solid #777;
            padding:7px;
            text-align:center;
        }

        tbody tr:nth-child(even){
            background:#f5f5f5;
        }

        .summary{
            width:45%;
            margin-top:25px;
        }

        .summary th{
            background:#444;
            color:white;
        }

        .summary td{
            text-align:left;
        }

        .footer{
            margin-top:60px;
            width:100%;
        }

        .ttd{
            width:40%;
            float:right;
            text-align:center;
        }

        .ttd p{
            margin:5px;
        }

        .print-date{
            margin-top:40px;
            text-align:left;
            font-size:11px;
            color:#666;
        }
    </style>

</head>

<body>

<div class="header">
    <h2>LAPORAN DONASI DARAH</h2>
    <p>Sistem Informasi Donor Darah</p>
</div>

<table class="info">

<tr>
<td width="25%"><b>Jenis Laporan</b></td>
<td width="75%">
@if($type=='harian')
Harian
@elseif($type=='bulanan')
Bulanan
@else
Tahunan
@endif
</td>
</tr>

<tr>
<td><b>Periode</b></td>
<td>
@if($type=='harian')
{{ \Carbon\Carbon::parse(request('tanggal'))->format('d F Y') }}
@elseif($type=='bulanan')
{{ \Carbon\Carbon::parse(request('tanggal'))->translatedFormat('F Y') }}
@else
{{ \Carbon\Carbon::parse(request('tanggal'))->format('Y') }}
@endif
</td>
</tr>

</table>

<table>

<thead>

<tr>
<th width="6%">No</th>
<th>Nama Pendonor</th>
<th width="10%">Gol.</th>
<th width="18%">Tanggal</th>
<th width="15%">Status</th>
<th width="12%">Jumlah</th>
</tr>

</thead>

<tbody>

@php
$total=0;
$diterima=0;
$ditolak=0;
@endphp

@forelse($donations as $donation)

<tr>

<td>{{ $loop->iteration }}</td>

<td style="text-align:left">
{{ $donation->donor->name ?? '-' }}
</td>

<td>{{ $donation->donor->blood_type ?? '-' }}</td>

<td>{{ \Carbon\Carbon::parse($donation->donation_date)->format('d-m-Y') }}</td>

<td>{{ ucfirst($donation->status) }}</td>

<td>{{ $donation->amount_ml }} ml</td>

</tr>

@php
$total++;

if($donation->status=="diterima"){
$diterima++;
}else{
$ditolak++;
}
@endphp

@empty

<tr>
<td colspan="6">Tidak ada data</td>
</tr>

@endforelse

</tbody>

</table>

<table class="summary">

<tr>
<th colspan="2">Ringkasan Laporan</th>
</tr>

<tr>
<td>Total Donasi</td>
<td>{{ $total }}</td>
</tr>

<tr>
<td>Donasi Diterima</td>
<td>{{ $diterima }}</td>
</tr>

<tr>
<td>Donasi Ditolak</td>
<td>{{ $ditolak }}</td>
</tr>

<tr>
<td>Total Stok Darah</td>
<td>{{ $diterima * 350 }} ml</td>
</tr>

</table>

<div class="footer">

<div class="ttd">

<p>{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>

<p>Petugas Donor Darah</p>

<br><br><br>

<p><b>(___________________)</b></p>

</div>

</div>

<div class="print-date">
Dicetak pada :
{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
</div>

</body>

</html>