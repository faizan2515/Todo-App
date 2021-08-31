<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    // protected $validationAttributes = [
    //     'form.email' => 'email',
    //     'form.name' => 'name',
    //     'form.password' => 'password'
    // ];

    public function save()
    {
        $this->validate([
            'name'=>'required|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed'
        ]);
        
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password'=> $this->password
        ]);
        Auth::login($user);
        return redirect('/');

    }
    public function render()
    {
        return view('livewire.register')
        ->extends('layouts.app')
        ->section('content');
    }
}
