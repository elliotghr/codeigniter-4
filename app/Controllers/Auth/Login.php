<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        // Generamos una condicional si existen o no variables de sesión
        if (!session()->is_logged) {
            return view('Auth/login');
        }
        return redirect()->route('posts');
    }

    public function signin()
    {
        // Verificamos que nos estén llegando los datos
        // dd($this->request->getPost());
        // Creamos un array de validaciones
        $validaciones = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        // Con validate validamos las acciones que vienen en el request, sin necesidad de hacer la instancia, el setRules
        if (!$this->validate($validaciones)) {
            return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
        }

        // Obtenemos y limpiamos los valores
        $email = trim($this->request->getVar('email'));
        $password = trim($this->request->getVar('password'));

        // Llamamos al modelo
        $model = model('UserModel');

        // Llamamos al método del modelo que traerá o no los datos
        if (!$user = $model->getUserBy('email', $email)) {
            return redirect()->back()->with('msg', [
                'type' => 'is-danger',
                'body' => 'Este usuario no se encuentra registrado en el sistema',
            ]);
        }
        if (!password_verify($password, $user[0]->password)) {
            return redirect()->back()->with('msg', [
                'type' => 'is-danger',
                'body' => 'Credenciales invalidas',
            ]);
        }
        session()->set([
            'user_id' => $user[0]->id,
            'user_name' => $user[0]->username,
            'is_logged' => true,
        ]);

        return redirect('')->route('posts')->with('msg', [
            'type' => 'success',
            'body' => 'Bienvenido nuevamente ' . $user[0]->username,
        ]);
    }

    // Método para eliminar la sesión y redirigir al login
    public function signout()
    {
        session()->destroy();
        return redirect('')->route('login');
    }
}
