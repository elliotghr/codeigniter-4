<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Post extends Entity
{
    protected $dates   = ['created_at', 'updated_at', 'deleted_at', 'publish_at'];

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
    // Generamos un método getAuthor para obtener los datos de otra tabla
    public function getAuthor()
    {
        if (!empty($this->attributes['author'])) {
            $userModel = model('UsersInfoModel');
            return $userModel->where('user_id', $this->attributes['author'])->first();
        }
        return $this;
    }
    // Método para obtener los nombres de las categorias
    public function getCategories()
    {
        $cpModel = model('CategoriesPosts');
        return $cpModel->where('post_id', $this->id)->join('categories', 'categories.id = categories_posts.category_id')->findAll() ?? [];
    }
    // Método para renderizar las imagenes
    public function getLink()
    {
        return base_url('covers/' . $this->cover);
    }
}
