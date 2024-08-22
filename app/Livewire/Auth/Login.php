<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;


class Login extends Component
{
    public $email;
    public $password;
    public $remember_token;

    public function render()
    {
        return view('livewire.auth.login')->extends('Layouts.app')->section('content');
    }
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function loginUser()
    {
        $this->validate();

        // Definisikan kunci throttle rate limiter
        $throttleKey = strtolower($this->email) . '|' . request()->ip();

        // Periksa apakah terlalu banyak percobaan
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $this->addError('email', __('auth.throttle', [
                'seconds' => RateLimiter::availableIn($throttleKey)
            ]));
            return;
        }

        // Coba login
        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ], $this->remember_token)) {
            // Ambil pengguna yang baru saja login
            $user = Auth::user();

            // Periksa apakah pengguna aktif
            if ($user) {
                // Jika login berhasil dan pengguna aktif, catat percobaan login\
                RateLimiter::clear($throttleKey);
                return redirect()->route('home');
            }
        } else {
            // Jika login gagal, tambahkan percobaan rate limiter
            RateLimiter::hit($throttleKey, 60);
            $this->addError('email', __('auth.failed'));
        }
    }
    public function logout()
    {
        Auth::logout();
        return view('/');
    }
}
