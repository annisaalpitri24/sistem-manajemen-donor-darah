<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pendonor</title>
</head>

<body>
    <h1>Registrasi Pendonor</h1> @if(session('success')) <div style=" background:#d1e7dd; color:#0f5132; padding:10px; border-radius:5px; margin-bottom:15px; "> {{ session('success') }} </div> @endif @if ($errors->any()) <div style=" background:#f8d7da; color:#842029; padding:10px; border-radius:5px; margin-bottom:15px; ">
        <ul style="margin:0;"> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
    </div> @endif <form action="/register" method="POST"> @csrf <label>Nama Lengkap</label><br> <input type="text" name="name" value="{{ old('name') }}" required> <br><br> <label>Golongan Darah</label><br> <select name="blood_type" required>
            <option value="">Pilih</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select> <br><br> <label>Jenis Kelamin</label><br> <select name="gender" required>
            <option value="">Pilih</option>
            <option value="M">Laki-laki</option>
            <option value="F">Perempuan</option>
        </select> <br><br> <label>Tanggal Lahir</label><br> <input type="date" name="birth_date" required> <br><br> <label>No HP</label><br> <input type="text" name="phone" value="{{ old('phone') }}" required> <br><br> <label>Email</label><br> <input type="email" name="email" value="{{ old('email') }}" required> <br><br> <label>Alamat</label><br> <textarea name="address">{{ old('address') }}</textarea> <br><br> <label>Password</label><br> <input type="password" name="password" required> <br><br> <label>Konfirmasi Password</label><br> <input type="password" name="password_confirmation" required> <br><br> <button type="submit"> Daftar </button> <a href="/login"> Sudah punya akun? Login </a> </form>
</body>

</html>