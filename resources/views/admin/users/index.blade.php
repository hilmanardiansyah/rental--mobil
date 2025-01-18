<x-app-layouts title="Daftar User">

    <div class="d-flex justify-content-end mb-4">
        <form action="{{ route('admin.users.index') }}" method="GET" class="form-inline">
            <input type="text" name="search" class="form-control mr-4 col-md" placeholder="Cari Nama/Email User..">
            <button type="submit" class="btn btn-icon icon-left btn-primary">Cari</button>
        </form>
    </div>


    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Daftar User</h4>
            <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah User
            </a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>SIM Number</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->sim_number }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-a-layouts>
