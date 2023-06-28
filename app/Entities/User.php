<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    // Hacemos uso de un date Mutator
    protected $dates = ['created_at', 'updated_at'];
    // Creamos una función set para hashear nuestro atributo
    protected function setPassword($password)
    {
        $this->attributes["password"] = password_hash($password, PASSWORD_BCRYPT);
    }
    // Creamos un username
    public function setUsername()
    {
        $this->attributes["username"] = explode(" ", $this->name)[0] . explode(" ", $this->surname)[0];
    }
}
