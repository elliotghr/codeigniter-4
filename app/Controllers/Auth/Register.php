<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        // Simulando un POST
        $data = [
            'email' => 'elliot@gmail.com',
            'password' => '12341234',
            'name' => 'elliot',
            'surname' => 'gandarilla',
            'group' => '2',
            'country_id' => '1',
        ];
        // Instanciamos la entidad pasando los datos del form
        $user = new User($data);
        // invocamos el método setUsername
        $user->setUsername();
        // Imprimimos lo que arroja la entidad
        d($user);
        // Acedemos al modelo UsersModel instanciandolo
        $userModel = new \App\Models\UserModel();
        // Usamos el método save para insertar los datos a la tabla
        $userModel->save($user);
        return view('Auth/register');
    }


    public function store()
    {
        return view('');
    }
}
