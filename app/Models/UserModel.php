<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    protected $returnType     = User::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['username', 'email', 'password', 'group'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Especificamos en que momento se ejecutará la callback
    protected $beforeInsert = ['addGroup'];
    protected $afterInsert = ['storeUserInfo'];

    protected $assignGroup;
    protected $infoUser;

    // Creamos un modelo para nuestro callback
    public function addGroup($data)
    {
        // Modificamos la data agregando un campo group con el valor de assignGroup
        // Independientemente del contenido de $data siempre habrá una clave data que contiene los datos primarios
        $data['data']['group'] = $this->assignGroup;
        // Retornamos la variable $data
        return $data;
    }
    // Creamos un modelo para obtener el id del grupo
    public function withGroup($group)
    {
        $row = $this->db->table('groups')->where('name_group', $group)->get()->getFirstRow();
        d($row);

        if ($row !== null) {
            $this->assignGroup = $row->group_id;
        }
    }
    public function storeUserInfo($data)
    {
        $this->infoUser->user_id = $data['id'];
        $model = model('UsersInfoModel');
        $model->insert($this->infoUser);
        return $data;
    }
    public function addInfoUser($ui)
    {
        $this->infoUser = $ui;
    }
}
