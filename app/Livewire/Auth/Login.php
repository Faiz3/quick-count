<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $email;
    public $password;
    public $is_visible = true;

    public function render()
    {
        return view('livewire.auth.login');
    }

    protected $messages = [
        'email.required'=>'Email harus di isi',
        'password.required'=>'Password harus di isi',
    ];

    public function validasi()
    {
        $this->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
    }

    public function updated()
    {
        $this->validasi();
    }

    public function login()
    {
        $user = User::where('email', $this->email)->first();

        if ($user)
        {
            if(Hash::check($this->password, $user->password))
            {
                auth()->login($user);
                return redirect('/app');
            }
            else
            {
                $this->dispatch('error', ['pesan'=>'password atau email salah!']);
            }
        }
        else
        {
            $this->dispatch('error', ['pesan'=>'Email tidak ditemukan!']);
        }
    }
}
