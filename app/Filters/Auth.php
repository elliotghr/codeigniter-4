<?php

namespace App\Filters;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si depuramos los argumentos recibidos a nuestro filtro podremos ver los 2 roles que indicamos en nuestra Route
        // dd($arguments);

        // Si no está logueado mandamos un redirect con un mensaje
        if (!session()->is_logged) {
            return redirect()->route('login')->with('msg', [
                'type' => 'warning',
                'body' => 'Para acceder primero debe logear su cuenta',
            ]);
        }

        // Creamos una validación para verificar que el usuario exista
        $model = model('UserModel');
        // En caso de que no exista destruimos la sesión y redirigimos al login
        if (!$user = $model->getUserBy('id', session()->user_id)) {
            session()->destroy();
            return redirect()->route('login')->with('msg', [
                'type' => 'danger',
                'body' => 'El usuario actualmente no está disponible',
            ]);
        }
        // Accedemos al modelo groupsModel
        $groups_model = model('GroupsModel');
        // Obtenemos los datos del grupo del usuario
        $group_data = $groups_model->where('group_id', $user[0]->group)->get()->getResult();
        // Si el rol no se encuentra con los argumentos que definimos en la Route mandamos un error 404
        if (!in_array($group_data[0]->name_group, $arguments)) {
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
