<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Categories extends BaseController
{
    public function index()
    {
        $model = model('CategoriesModel');

        return view('Admin/categories', [
            // Numero de registros por página
            // En el archivo de configuración creamos la propiedad regPerPage y traemos su valor
            'categories' => $model->paginate(config('CustomBlog')->regPerPage),
            // Pasamos la propiedad pager que ya viene incluida en el modelo, el cual generará los indices de la paginación
            'pager' => $model->pager
        ]);
    }
    public function create()
    {
        return view('Admin/categories_create');
    }
    public function store()
    {
        // Creamos validaciones
        $validaciones = [
            'name' => 'required|max_length[120]'
        ];
        // Validamos los campos
        if (!$this->validate($validaciones)) {
            // Enviamos un array msg y un array de errores
            return redirect()->back()->withInput()->with('msg', [
                'type' => 'is-danger',
                'body' => 'Datos incorrectos',
            ])->with('errors', $this->validator->getErrors());
        }
        // Recibimos los datos
        $name = $this->request->getVar('name');

        // Conectamos al modelo 
        $model = model('CategoriesModel');
        // Generamos la inserción de los datos
        $model->save([
            'name' => $name
        ]);
        // Redireccionamos al listado de categorias con un mensaje de confirmación
        return redirect('categories')->with("msg", [
            'type' => 'success',
            'body' => 'Categoría creada con éxito!',
        ]);
    }
    public function edit($id)
    {
        echo 'editando' . $id;
    }
}
