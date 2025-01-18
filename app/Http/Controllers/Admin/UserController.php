<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Constructor untuk middleware 'auth' dan 'role:admin'
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    // Menampilkan daftar semua pengguna
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $users = $query->get();

        return view('admin.users.index', compact('users'));
    }


    // Menampilkan form untuk membuat pengguna baru
    public function create()
    {
        return view('admin.users.create');
    }

    // Menyimpan pengguna baru ke database
   // Menyimpan pengguna baru ke database
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone_number' => 'required|string|max:15',
        'sim_number' => 'required|string|max:20',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
        'role' => 'required|in:admin,customer', // Validasi role
    ]);

    // Membuat pengguna baru
    $user = User::create([
        'name' => $validated['name'],
        'address' => $validated['address'],
        'phone_number' => $validated['phone_number'],
        'sim_number' => $validated['sim_number'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    // Assign role
    $user->assignRole($validated['role']);


    return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
}


    // Menampilkan form untuk mengedit pengguna
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Menyimpan perubahan pengguna setelah diedit
    // Menyimpan perubahan pengguna setelah diedit
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'sim_number' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,' . $id, // Mengabaikan validasi email yang sama dengan ID ini
            'password' => 'nullable|min:8|confirmed', // Password opsional saat update
            'role' => 'required|in:admin,customer', // Validasi role
        ]);

        // Mencari pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Update data pengguna
        $user->name = $validated['name'];
        $user->address = $validated['address'];
        $user->phone_number = $validated['phone_number'];
        $user->sim_number = $validated['sim_number'];
        $user->email = $validated['email'];

        // Jika password diubah, hash ulang password
        if ($request->password) {
            $user->password = Hash::make($validated['password']);
        }

        // Menyimpan perubahan pengguna
        $user->save();

        // Update role jika diperlukan
        $user->syncRoles([$validated['role']]);

        // Redirect ke halaman daftar pengguna dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }


    // Menghapus pengguna
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
