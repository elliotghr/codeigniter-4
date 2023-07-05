<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Posts extends BaseController
{
    public function index()
    {
        return view('Admin/posts');
    }

    public function create()
    {
        // Enviamos los datos de las categorias para renderizarlos en el checkbox
        $model = model('CategoriesModel');
        $data['categories'] = $model->findAll();

        return view('Admin/posts_create', $data);
    }

    public function store()
    {
        d($this->request->getPost());
        dd($this->request->getFile('cover'));
    }
}
