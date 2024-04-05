<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pembelians;
use App\Models\User;
use App\Models\Hotel;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newUsersCount = User::count(); // Mengambil jumlah pengguna dari tabel pengguna
        $totalOrdersCount = Pembelians::count(); // Mengambil jumlah total pembelian dari tabel pembelian
        $registeredHotelsCount = Hotel::count(); // Mengambil jumlah hotel terdaftar dari tabel hotels
        return view('admin.dashboard', [
            'newUsersCount' => $newUsersCount,
            'totalOrdersCount' => $totalOrdersCount,
            'registeredHotelsCount' => $registeredHotelsCount
        ]); // Mengirimkan data ke view
    }

    public function showUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        // Logika untuk menampilkan form edit pengguna
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8', // password field is optional
        ]);

        try {
            // Periksa apakah password diisi
            if (!empty($validatedData['password'])) {
                $user->password = Hash::make($validatedData['password']);
            }

            // Simpan perubahan pada user
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->save();

            // Redirect ke halaman admin.users.index dengan pesan sukses
            return redirect()->route('admin.users.index')->with('success', 'User successfully updated!');
        } catch (\Exception $e) {
            // Redirect kembali ke halaman edit user dengan pesan error jika terjadi kesalahan
            return redirect()->back()->with('error', 'An error occurred while updating user.');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    /**
     * Remove the specified resource from storage.
     */
}
