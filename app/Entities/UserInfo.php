<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class UserInfo extends Entity
{
    // Hacemos uso de un date Mutator
    protected $dates = ['created_at', 'updated_at'];
}
