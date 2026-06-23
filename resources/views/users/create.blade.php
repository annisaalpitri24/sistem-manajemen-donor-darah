<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
</head>
<body>

<h2>Tambah User</h2>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li style="color:red">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/users" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Nama"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>

    <select name="role">
        <option value="admin">Admin</option>
        <option value="petugas">Petugas</option>
        <option value="pendonor">Pendonor</option>
    </select><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>