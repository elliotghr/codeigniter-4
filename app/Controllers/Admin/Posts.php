<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Post;

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
        // d($this->request->getPost());
        // dd($this->request->getFile('cover'));
        $validations = [
            'title' => 'required',
            'body' => 'required',
            'published_at' => 'required|valid_date',
            'categories.*' => 'permit_empty|is_not_unique[categories.id]',
            'cover' => 'uploaded[cover]|is_image[cover]',
        ];

        if (!$this->validate($validations)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $file = $this->request->getFile('cover');

        // Instanciamos la entidad
        $post = new Post($this->request->getPost());
        // Usamos el método setSlug
        $post->setSlug($this->request->getVar('title'));
        // Incluimos la propiedad author
        $post->author = session()->user_id;
        // Incluimos la propiedad cover
        $post->cover = $file->getRandomName();

        // Guardamos nuestros cover en la carpeta writable/uploads/covers
        $file->store('covers/', $post->cover);
        dd($post);
    }
}
