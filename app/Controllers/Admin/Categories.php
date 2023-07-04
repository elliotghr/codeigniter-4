<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Categories extends BaseController
{
    public function index()
    {
        return view('Admin/categories');
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
}
