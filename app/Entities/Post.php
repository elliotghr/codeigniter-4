<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Post extends Entity
{
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];

    public function setSlug($title)
    {
        // Convertimos el titulo a un slug
        $slug = mb_url_title($title, '-');
        // Verificamos que no exista el slug
        $model = model('PostModel');

        // Si encuentra un slug duplicado....
        while ($model->where('slug', $slug)->find() != null) {
            // Mutamos el string
            $slug = increment_string($slug, '_');
        }

        // Asignamos el valor de slug a la entidad
        $this->attributes['slug'] = $slug;
    }
}
