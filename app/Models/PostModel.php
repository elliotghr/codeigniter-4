<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Post;

class PostModel extends Model
{
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Post::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'slug', 'body', 'cover', 'author', 'publish_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Callbacks
    protected $allowCallbacks = true;
    protected $afterInsert    = ['storeCategories'];

    protected $categories    = [];

    // Creamos un método para guadar las categorias en un array llamado $categories
    public function assignCategories($categories)
    {
        $this->categories = $categories;
    }
    // Creamos una callback para insertar datos en otra tabla
    public function storeCategories($data)
    {
        // Validamos que el array categories no venga vacío ya que no es un dato requerido
        if (!empty($this->categories)) {
            // Si viene con datos ingresamos al modelo de categories_post
            $cpModel = model('CategoriesPosts');
            // Declaramos un array
            $cats = [];
            // Creamos una estructura para insertar los datos de las categorias que vienen del formulario
            foreach ($this->categories as $value) {
                $cats[] = [
                    'category_id' =>  $value,
                    'post_id' => $data['id'],
                ];
            }
            // Generamos un insertBatch
            $cpModel->insertBatch($cats);
        }
        return $data;
    }

    // El método retornará el where para validar la publicación del post
    public function published()
    {
        $this->where('publish_at <=', date('Y-m-d H:i:s'));
        return $this;
    }
}
