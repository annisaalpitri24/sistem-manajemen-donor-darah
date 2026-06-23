<h1>Registrasi Pendonor</h1>

<form action="/register" method="POST">
    @csrf

    <label>Nama Lengkap</label><br>
    <input type="text" name="name" required>
    <br><br>

    <label>Golongan Darah</label><br>
    <select name="blood_type" required>
        <option value="">Pilih</option>
        <option>A+</option>
        <option>A-</option>
        <option>B+</option>
        <option>B-</option>
        <option>AB+</option>
        <option>AB-</option>
        <option>O+</option>
        <option>O-</option>
    </select>
    <br><br>

    <label>Jenis Kelamin</label><br>
    <select name="gender" required>
        <option value="">Pilih</option>
        <option value="M">Laki-laki</option>
        <option value="F">Perempuan</option>
    </select>
    <br><br>

    <label>Tanggal Lahir</label><br>
    <input type="date" name="birth_date" required>
    <br><br>

    <label>No HP</label><br>
    <input type="text" name="phone" required>
    <br><br>

    <label>Email</label><br>
    <input type="email" name="email" required>
    <br><br>

    <label>Alamat</label><br>
    <textarea name="address"></textarea>
    <br><br>

    <label>Password</label><br>
    <input type="password" name="password" required>
    <br><br>

    <label>Konfirmasi Password</label><br>
    <input type="password" name="password_confirmation" required>
    <br><br>

    <button type="submit">
        Daftar
    </button>
</form>