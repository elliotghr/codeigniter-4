<?php

namespace App\Controllers\Front;
// Importamos la clase codigo
use App\Libraries\Codigo;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function sayHola()
    {
        // Instanciamos un objeto de esta clase
        $instancia_codigo = new Codigo();
        // Llamamos al método
        echo $instancia_codigo->sayHi();
    }
}
