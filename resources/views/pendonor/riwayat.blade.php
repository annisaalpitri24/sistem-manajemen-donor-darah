<h2>Riwayat Donor</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Jumlah</th>
    </tr>

    @forelse($donations as $donation)
    <tr>
        <td>{{ $donation->donation_date }}</td>
        <td>{{ $donation->location }}</td>
        <td>{{ $donation->amount_ml }} ml</td>
    </tr>
    @empty
    <tr>
        <td colspan="3">
            Belum ada riwayat donor
        </td>
    </tr>
    @endforelse

</table>

<br>

<a href="/pendonor/dashboard">
    Kembali ke Dashboard
</a>