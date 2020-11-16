<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginForm extends Component
{

    public $username;
    public $password;

    public $rules = [
        'username' => 'required',
        'password' => 'required|min:6',
    ];

    public function mount()
    {
        if(Auth::check())
        {
            return redirect()->route('dashboard');
        }
    }


    public function loginAttemp ()
    {
       $this->validate($this->rules,
           ['username.required' => 'Debe ingresar el usuario',
            'password.required' => 'Debe ingresar el contraseña',
            'password.min' => 'El mínimo de carácteres es de 6']);

        $credentials = ['username' => $this->username, 'password' => $this->password];

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }else {
            $this->addError('credenciales', 'Error de usuario y o contraseña');
        }
    }


    public function render()
    {
        return view('livewire.login-form')
                ->extends('layouts.login')
                ->section('content');
    }
}
