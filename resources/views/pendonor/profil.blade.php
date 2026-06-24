<h2>Profil Saya</h2>

<p>Nama : {{ Auth::user()->name }}</p>
<p>Email : {{ Auth::user()->email }}</p>

<a href="/pendonor/dashboard">
    Kembali
</a>