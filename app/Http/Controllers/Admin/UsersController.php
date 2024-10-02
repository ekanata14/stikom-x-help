<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Models
use App\Models\User;
use App\Models\UserType;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [
            'title' => 'Users Management',
            'activePage' => 'users',
            'users' => User::where('id_user_type', '!=', 1)->paginate(10),
        ];

        return view('admin-dashboard.users.index', $viewData);
    }

    public function admin()
    {
        $viewData = [
            'title' => 'Admin Management',
            'activePage' => 'admin',
            'users' => User::where('id_user_type', 1)->paginate(10),
        ];

        return view('admin-dashboard.users.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $viewData = [
            'title' => 'Add User',
            'activePage' => 'users',
            'userTypes' => UserType::where('id', '!=', 1)->get(),
        ];

        return view('admin-dashboard.users.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'complete_name' => 'required|string|max:255',
            'id_user_type' => 'required|exists:user_types,id',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'mobile_phone' => 'required|string|max:15',
            'institution' => 'nullable|string|max:255',
            'front_degree' => 'nullable|string|max:255', // Tambahkan ini
            'back_degree' => 'nullable|string|max:255', // Tambahkan ini
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'complete_name' => $request->complete_name,
            'id_user_type' => $request->id_user_type,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'mobile_phone' => $request->mobile_phone,
            'institution' => $request->institution,
            'front_degree' => $request->front_degree, // Tambahkan ini
            'back_degree' => $request->back_degree,   // Tambahkan ini
            // Pastikan Anda mengisi kolom lain yang diperlukan
        ]);

        return redirect()->route('users.index')->with('success', 'User added successfully.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $viewData = [
            'title' => 'Edit User',
            'activePage' => 'users',
            'user' => User::findOrFail($id),
            'userTypes' => UserType::where('id', '!=', 1)->get(),
        ];

        return view('admin-dashboard.users.edit', $viewData);
    }

    // Memperbarui data pengguna
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'complete_name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email,' . $id,
            ],
            'mobile_phone' => 'required|string|max:20',
            'institution' => 'nullable|string|max:255',
            'front_degree' => 'nullable|string|max:50',
            'back_degree' => 'nullable|string|max:50',
            'password' => 'nullable|string|min:8|confirmed',
            'id_user_type' => 'required|exists:user_types,id',
        ]);

        // Mencari pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Mengupdate data pengguna
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->complete_name = $validatedData['complete_name'];
        $user->email = $validatedData['email'];
        $user->mobile_phone = $validatedData['mobile_phone'];
        $user->institution = $validatedData['institution'];
        $user->front_degree = $validatedData['front_degree'];
        $user->back_degree = $validatedData['back_degree'];
        $user->id_user_type = $validatedData['id_user_type'];

        // Jika password diisi, hash dan simpan
        if (!empty($validatedData['password']) && $validatedData['password'] != null) {
            $user->password = Hash::make($validatedData['password']);
        }

        // Simpan perubahan
        $user->save();

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('users.index')->with('success', __('User updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Menghapus pengguna
        $user->delete();

        // Redirect ke halaman daftar pengguna dengan pesan sukses
        return redirect()->route('users.index')->with('success', __('User deleted successfully.'));

    }
}
