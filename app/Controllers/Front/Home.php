<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    public function index()
    {
        // Utilizamos el modelo de la tabla Post
        $model = model('PostModel');
        // Importamos los helpers para nuestra vista
        helper('text');
        helper('inflector');
        // Enviamos los datos con paginación, ordenados y usando el método published del modelo
        $data['posts'] = $model->published()->orderBy('publish_at', 'DESC')->paginate(9);
        $data['pager'] = $model->pager;
        return view('Front/Home', $data);
    }

    public function article($slug)
    {
        $model = model('PostModel');
        // Validamos la existencia del slug
        if (!$post = $model->where('slug', $slug)->first()) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data['post'] = $post;
        return view('Front/article', $data);
        echo $slug;
    }

    public function filter($args)
    {
        // Traesmos el modelo
        $model = model('PostModel');
        // Importamos los helpers para nuestra vista
        helper('text');
        $data['posts'] = $model->getPostsByCategory($args['category'])->findAll($args['limit'] ?? 0);
        // Retornamos la vista filter donde se renderizará todo
        // Pasamos la variable posts donde enviamos la consulta del modelo, pasamos la categoria del view cell y al findAll le pasamos el limite si viene definido
        return view('Front/filter', $data);
    }
}
