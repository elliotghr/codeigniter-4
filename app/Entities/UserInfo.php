<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class UserInfo extends Entity
{
    // Hacemos uso de un date Mutator
    protected $dates = ['created_at', 'updated_at'];

    // Generamos un método para renderizar los datos del autor
    public function getFullName()
    {
        return $this->name . " " . $this->surname;
    }
}
