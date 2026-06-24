<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>

        <td>
            @if($user->status == 'pending')
            <span style="color:orange;">
                Pending
            </span>
            @else
            <span style="color:green;">
                Aktif
            </span>
            @endif
        </td>

        <td>

            @if($user->status == 'pending')
           <form action="{{ route('users.approve', $user->id) }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-success btn-action">
                    <i class="fa-solid fa-check"></i>
                    Setujui
                </button>
            </form>
            @endif

            <a href="/users/{{ $user->id }}/edit">
                Edit
            </a>

            <form action="/users/{{ $user->id }}"
                method="POST"
                style="display:inline;">
                @csrf
                @method('DELETE')

                <button type="submit"
                    onclick="return confirm('Hapus user ini?')">
                    Hapus
                </button>
            </form>

        </td>
    </tr>
    @endforeach
</table>