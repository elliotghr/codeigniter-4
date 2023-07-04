<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
// Traemos el paquete hasids
use Hashids\Hashids;

class Category extends Entity
{
    // Hacemos uso de un date Mutator
    protected $dates = ['created_at', 'updated_at'];

    public function getEditLink()
    {
        return base_url(route_to('categories_edit', $this->id));
    }

    public function getDeleteLink()
    {
        $hashids = new Hashids();

        return base_url(route_to('categories_delete', $hashids->encode($this->id)));
    }
}
