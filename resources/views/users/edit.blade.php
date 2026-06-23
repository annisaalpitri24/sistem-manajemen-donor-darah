<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form action="/users/{{ $user->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $user->name }}"><br><br>
    <input type="email" name="email" value="{{ $user->email }}"><br><br>

    <input type="password" name="password" placeholder="Password baru (opsional)"><br><br>

    <select name="role">
        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
        <option value="pendonor" {{ $user->role == 'pendonor' ? 'selected' : '' }}>Pendonor</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>