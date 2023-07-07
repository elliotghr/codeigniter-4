<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        // Utilizamos el modelo de la tabla Post
        $model = model('PostModel');
        // Enviamos los datos con paginación, ordenados y usando el método published del modelo
        $data['posts'] = $model->published()->orderBy('publish_at', 'DESC')->paginate(9);
        $data['pager'] = $model->pager;
        return view('Front/Home', $data);
    }
}
