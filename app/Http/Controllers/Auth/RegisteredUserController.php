<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

// Models
use App\Models\User;
use App\Models\UserType;
use App\Models\Purchase;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $userTypes = UserType::where('id', '!=', 1)->get();
        return view('auth.register', compact('userTypes'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
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

        DB::beginTransaction(); // Mulai DB transaction

        try {
            // Hash password
            $validatedData['password'] = Hash::make($validatedData['password']);

            // Simpan identity card (jika ada file)
            if ($request->hasFile('identity_card')) {
                $validatedData['identity_card'] = $request->file('identity_card')->store('identity_cards', 'private');
            }

            // Buat user baru
            $user = User::create($validatedData);

            // Event user terdaftar
            event(new Registered($user));

            // Login user
            Auth::login($user);

            // Cek apakah user sudah melakukan pembelian atau belum
            if (Purchase::where('user_id', $user->id)->count() == 0) {
                DB::commit(); // Jika sukses, commit transaction
                return redirect(route('user.purchase', absolute: false))
                    ->with('success', 'Registration successful. Please make a purchase.');
            } else {
                DB::commit(); // Jika sukses, commit transaction
                return redirect(route('user.dashboard', absolute: false));
            }
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan
            dd($e);
            $logError = Log::error('Registration failed: ' . $e->getMessage()); // Log error
            return redirect()->back()->withErrors('Registration failed. Please try again later.');
        }
    }
}
