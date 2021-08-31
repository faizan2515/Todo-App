<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $form=[
        'email'=>'',
        'password'=>''
    ];

    protected $validationAttributes = [
        'form.email' => 'email',
        'form.password' => 'password'
    ];

    public function save()
    {
        $user = $this->validate([
            'form.email'=>'required|email',
            'form.password'=>'required'
        ]);
        if(Auth::attempt($this->form))
        {
            return redirect('/');
        }
        else
        {
            session()->flash('message', 'Incorrect Credentials');
        }
        

    } 


    public function render()
    {
        return view('livewire.login')
        ->extends('layouts.app')
        ->section('content');
    }
}
