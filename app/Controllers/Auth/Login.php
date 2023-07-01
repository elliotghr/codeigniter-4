<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        return view('Auth/login');
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

        echo "Validaciones correctas";
    }
}
