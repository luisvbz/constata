<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Perfil extends Component
{
    public $user = [
        'id' => '',
        'name' => '',
        'username' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',
    ];

    public function mount()
    {
        $u = auth()->user();

        $this->user['id'] = $u->id;
        $this->user['name'] = $u->name;
        $this->user['email'] = $u->email;
        $this->user['username'] = $u->username;
    }

    public function updated($field)
    {
        $this->validateOnly($field,
            [
                'user.name' => 'required',
                'user.username' => 'required',
                'user.email' => 'required|email',
                'user.password' => 'min:6',
                'user.password_confirmation' => ['same:user.password', Rule::requiredIf(function () {
                    return strlen($this->user['password']) > 0;
                })],
            ],
            [
                'user.name.required' => 'Debe ingresar su nombre y apellido',
                'user.username.required' => 'Debe ingresar el usuario',
                'user.email.required' => 'Debe ingresar su correo electrónico',
                'user.email.email' => 'El correo electrónico es inválido',
                'user.password.min' => 'La clave debe tener mínimo 6 carácteres',
                'user.password_confirmation.same' => 'Las claves debe coincidir',
                'user.password_confirmation.required_if' => 'Debe confirmar la clave',
            ]
        );
    }

    public function actualizar()
    {
        $this->validate(
          [
              'user.name' => 'required',
              'user.username' => 'required',
              'user.email' => 'required|email',
              'user.password' => 'min:6',
              'user.password_confirmation' => ['same:user.password', Rule::requiredIf(function () {
                  return strlen($this->user['password']) > 0;
              })],
          ],
          [
            'user.name.required' => 'Debe ingresar su nombre y apellido',
            'user.username.required' => 'Debe ingresar el usuario',
            'user.email.required' => 'Debe ingresar su correo electrónico',
            'user.email.email' => 'El correo electrónico es inválido',
            'user.password.min' => 'La clave debe tener mínimo 6 carácteres',
            'user.password_confirmation.same' => 'Las claves debe coincidir',
            'user.password_confirmation.required_if' => 'Debe confirmar la clave',
          ]
        );


        try
        {
            DB::beginTransaction();
            User::find($this->user['id'])->update([
                'name' => $this->user['name'],
                'username' => $this->user['username'],
                'email' => $this->user['email'],
            ]);

            if($this->user['password'] != '')
            {
                User::find($this->user['id'])->update([
                    'password' => bcrypt($this->user['password']),
                ]);
            }

            DB::commit();

            session()->flash('message', 'Los cambios se han realizado con éxito');

            $this->user['password'] = '';
            $this->user['password_confirmation'] = '';

        }catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.dashboard.perfil')
                    ->extends('layouts.dashboard')
                    ->section('content');
    }
}
