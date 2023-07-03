<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si no está logueado mandamos un redirect con un mensaje
        if (!session()->is_logged) {
            return redirect()->route('login')->with('msg', [
                'type' => 'warning',
                'body' => 'Para acceder primero debe logear su cuenta',
            ]);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
