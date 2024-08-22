<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{


    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function render()
    {
        return view('livewire.auth.register')->extends('Layouts.app')->section('content');;
    }
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:4',
    ];
    public function registersUsers()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        Auth::login($user, true);

        return redirect()->route('login');
    }
}
