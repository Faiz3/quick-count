<?php

namespace App\Livewire\Menu;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class TambahUser extends Component
{
    public $id;
    public $is_create;
    public $is_update;
    public $nama;
    public $email;
    public $password;
    public $on_password;
    
    public function render()
    {
        $users = User::first()->get();
        return view('livewire.menu.tambah-user', compact('users'));
    }

    public function update()
    {
        $user = User::find($this->id);
        $user->name = $this->nama;
        // cek email
        $mail = User::where('email', $this->email)->first();
        if($mail->email === $user->email && $user->email === $this->email)
        {
            $user->email = $this->email;
            $user->password = Hash::make($this->password);
            $user->on_password = $this->password;
            $user->save();
            $this->dispatch('success', ['pesan'=>'Berhasil diupdate']);
        }
        else
        {
            $this->dispatch('error', ['pesan'=>'Email sudah digunakan']);
        }
    }

    public function create()
    {
        
        $new_user = new User();

        // cek user
        $cek = User::where('email', $this->email)->first();
        if(!$cek)
        {
            // create user
            $new_user->name = $this->nama;
            $new_user->email = $this->email;
            $new_user->on_password = $this->password;
            $new_user->password = Hash::make($this->password);
            $new_user->save();
            $this->is_create = !$this->is_create;
            $this->dispatch('success', ['pesan'=>'User berhasil ditambah']);
        }
        else
        {
            $this->dispatch('error', ['pesan'=>'Email ini sudah digunakan!']);
        }
    }

    // on create
    public function onCreate()
    {
        $this->is_create = !$this->is_create;
    }

    // on update
    public function onUpdate($id)
    {
        $user = User::find($id);
        $this->id = $user->id;
        $this->nama  = $user->name;
        $this->email = $user->email;
        $this->password = $user->on_password;
        $this->is_update = !$this->is_update;
    }

    // delete
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        $this->dispatch('success', ['pesan'=>'User berhasil dihapus']);
    }
}
