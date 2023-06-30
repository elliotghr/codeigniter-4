<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Entities\UserInfo;

class Register extends BaseController
{
    // Creamos un atributo para guardar la referencia al customBlog
    protected $configs;

    public function __construct()
    {
        // Creamos un constructor y utilizamos el méotodo config con el nombre de la custom config para acceder a nuestro campo
        $this->configs = config('CustomBlog');
    }

    public function index()
    {
        // Hacemos uso del modelo CountriesModel
        $countries = model('CountriesModel');
        // Enviamos los datos a al vista
        $data['paises'] = $countries->findAll();

        return view('Auth/register', $data);
    }


    public function store()
    {
        // Simulando un POST
        $data = [
            'email' => 'mosho@gmail.com',
            'password' => '12341234',
            'name' => 'mosho',
            'surname' => 'chisti',
            'country_id' => '1',
        ];
        // Instanciamos la entidad pasando los datos del form
        $user = new User($data);
        // invocamos el método setUsername
        $user->setUsername();
        // Imprimimos lo que arroja la entidad
        // d($user);
        // Imprimimos lo que arroja el CustomBlog
        d($this->configs);
        // Acedemos al modelo UsersModel instanciandolo
        $userModel = new \App\Models\UserModel();
        // Accedemos al método withGroup y pasamos como parametro el valor que se obtiene en $this->configs->default_group_users
        $userModel->withGroup($this->configs->default_group_users);

        // Instanciamos UserInfo y le pasamos los datos
        $userInfo = new UserInfo($data);
        $userModel->addInfoUser($userInfo);

        // Usamos el método save para insertar los datos a la tabla
        $userModel->save($user);
        return view('Auth/register');
    }
}
