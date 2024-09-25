<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
        $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'complete_name' => ['required', 'string', 'max:255'], // Validasi nama lengkap
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'mobile_phone' => ['required', 'string', 'max:20'], // Validasi nomor telepon
            'institution' => ['nullable', 'string', 'max:100'], // Institusi opsional
            'front_degree' => ['nullable', 'string', 'max:50'], // Gelar depan opsional
            'back_degree' => ['nullable', 'string', 'max:50'], // Gelar belakang opsional
            'id_user_type' => ['required', 'exists:user_types,id'], // Pastikan id_user_type ada di tabel user_types
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'complete_name' => $request->complete_name,
            'email' => $request->email,
            'mobile_phone' => $request->mobile_phone,
            'institution' => $request->institution,
            'front_degree' => $request->front_degree,
            'back_degree' => $request->back_degree,
            'id_user_type' => $request->id_user_type, // Mengambil id tipe user dari request
            'password' => Hash::make($request->password), // Mengenkripsi password
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
