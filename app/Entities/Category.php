<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Category extends Entity
{
    // Hacemos uso de un date Mutator
    protected $dates = ['created_at', 'updated_at'];

    public function getEditLink()
    {
        return base_url(route_to('categories_edit', $this->id));
    }
}
