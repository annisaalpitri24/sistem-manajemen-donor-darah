<h1>Dashboard Petugas</h1>

<p>Selamat datang {{ Auth::user()->name }}</p>

<div>
    <h3>Total Pendonor</h3>
    <h1>{{ $totalDonor }}</h1>
</div>

<div>
    <h3>Total Donasi</h3>
    <h1>{{ $totalDonasi }}</h1>
</div>

<a href="/blood-donors">Data Pendonor</a>
<br>
<a href="/donations">Data Donasi</a>