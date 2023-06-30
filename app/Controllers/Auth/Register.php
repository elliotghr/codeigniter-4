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
        // $data = [
        //     'email' => 'mosho@gmail.com',
        //     'password' => '12341234',
        //     'name' => 'mosho',
        //     'surname' => 'chisti',
        //     'country_id' => '1',
        // ];

        // Cargamos la biblioteca de validaciones
        $validation = \Config\Services::validation();

        // Preparemos nuestras reglas para los campos
        $validation->setRules([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|matches[c-password]',
            'country_id' => 'required|is_not_unique[countries.country_id]',
        ]);

        // Creamos una condicional si obtenemos errores
        if (!$validation->withRequest($this->request)->run()) {
            // dd($validation->getErrors());
            // Generamos una redirección con el valor de los inputs
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        // Instanciamos la entidad pasando los datos de la request que vienen por POST
        $user = new User($this->request->getPost());
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
        $userInfo = new UserInfo($this->request->getPost());
        $userModel->addInfoUser($userInfo);

        // Usamos el método save para insertar los datos a la tabla
        $userModel->save($user);
        // return view('Auth/register');
        // Generamos un redirect a una ruta especifica
        return redirect()->route('login')->with('msg', 'Usuario registrado con éxito');
    }
}
