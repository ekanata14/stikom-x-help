<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Illuminate\Support\Facades\Storage;

// Mail
use Illuminate\Support\Facades\Mail;
use App\Mail\CompleteProfileMail;

// Models
use App\Models\User;
use App\Models\UserType;
use App\Models\MailHistory;

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
            'userTypes' => UserType::all(),
        ];

        return view('admin-dashboard.users.index', $viewData);
    }

    public function admin()
    {
        $viewData = [
            'title' => 'Admin Management',
            'activePage' => 'admin',
            'users' => User::where('id_user_type', 1)->paginate(10),
            'userTypes' => UserType::all(),
        ];

        return view('admin-dashboard.users.index', $viewData);
    }

    public function updateIdentityId()
    {
        $viewData = [
            'title' => 'Update Identity ID',
            'activePage' => 'users',
        ];

        return view('user-dashboard.updateId', $viewData);
    }

    public function completeProfileEmail()
    {
        $users = User::where('id_user_type', '=', '8')->get();
        return $users;

        foreach ($users as $user) {
            MailHistory::create([
                'user_id' => $user->id,
            ]);
            Mail::to($user->email)->send(new CompleteProfileMail($user->email));
        }

        return back()->with('success', 'Email sent successfully.');
    }

    public function updateIdentityIdStore(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'identity_id' => 'required|string|max:255',
            'identity_card' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $user = User::find($validatedData['id']);
        $user->identity_id = $validatedData['identity_id'];
        // Simpan identity card (jika ada file)
        if ($request->hasFile('identity_card')) {
            $validatedData['identity_card'] = $request->file('identity_card')->store('identity_cards', 'private');
            $user->identity_card = $validatedData['identity_card'];
        }
        $user->save();

        return redirect()->route('user.dashboard')->with('success', 'Profile updated successfully.');
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
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'first_name' => ['required', 'string', 'max:100'],
                'last_name' => ['required', 'string', 'max:100'],
                'complete_name' => ['required', 'string', 'max:255'], // Validasi nama lengkap
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'mobile_phone' => ['required', 'string', 'max:20'], // Validasi nomor telepon
                'institution' => ['nullable', 'string', 'max:100'], // Institusi opsional
                'occupation' => ['nullable', 'string', 'max:50'], // Gelar depan opsional
                'identity_id' => ['required', 'string', 'max:50'], // Validasi nomor identitas
                'id_user_type' => ['required', 'exists:user_types,id'], // Pastikan id_user_type ada di tabel user_types
                'password' => ['required', 'confirmed', RulesPassword::defaults()],
                'identity_card' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar payment_receipt
            ]);

            // Hash password
            $validatedData['password'] = Hash::make($validatedData['password']);

            // Save identity card (if file exists)
            if ($request->hasFile('identity_card')) {
                $validatedData['identity_card'] = $request->file('identity_card')->store('identity_cards', 'private');
            }

            User::create($validatedData);

            DB::commit();

            return redirect()->route('users.index')->with('success', 'User added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')->with('error', 'User failed to add.');
        }
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
        DB::beginTransaction();
        try {
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
                'occupation' => 'nullable|string|max:50',
                'password' => 'nullable|string|min:8|confirmed',
                'id_user_type' => 'required|exists:user_types,id',
                'identity_card' => 'nullable|string|max:255',
                'identity_id' => 'nullable|string|max:255',
            ]);

            // Mencari pengguna berdasarkan ID
            $user = User::findOrFail($id);

            // Jika password diisi, hash dan simpan
            if (!empty($validatedData['password']) && $validatedData['password'] != null) {
                $user->password = Hash::make($validatedData['password']);
            }

            // Save identity card (if file exists)
            if ($request->hasFile('identity_card')) {
                $validatedData['identity_card'] = $request->file('identity_card')->store('identity_cards', 'private');
            }

            // Mengupdate data pengguna
            // Hapus password dari validatedData jika tidak diisi
            unset($validatedData['password']); // Pastikan password tidak disimpan jika tidak ada

            $user->update($validatedData);

            DB::commit();

            // Redirect ke halaman yang diinginkan dengan pesan sukses
            return redirect()->route('users.index')->with('success', __('User updated successfully.'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')->with('error', __('User failed to update.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            // Mencari pengguna berdasarkan ID
            $user = User::findOrFail($id);

            // Menghapus pengguna
            $user->delete();

            DB::commit();

            // Redirect ke halaman daftar pengguna dengan pesan sukses
            return redirect()->route('users.index')->with('success', __('User deleted successfully.'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')->with('error', __('User failed to delete.'));
        }
    }

    public function showStudentCard(string $id)
    {
        $user = User::find($id);
        // Cek apakah file ada di storage
        if (Storage::disk('private')->exists($user->identity_card)) {
            // Jika file ditemukan, tampilkan sebagai response download
            return Storage::disk('private')->download($user->identity_card);
        }

        // Jika file tidak ditemukan, kembalikan response error
        return back()->with('error', 'Student Card not found.');
    }

    public function download(string $id)
    {
        $user = User::find($id);
        if (Storage::disk('private')->exists('identity_cards/' . $user->identity_card)) {
            // Mendapatkan path file
            $path = Storage::disk('private')->path('identity_cards/' . $user->identity_card);

            // Mengembalikan response untuk menampilkan gambar
            return response()->file($path);
        }

        return back()->with('error', 'Receipt not found.');
    }
}
