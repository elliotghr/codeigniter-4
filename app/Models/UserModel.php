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


    protected $assignGroup;

    // Creamos un modelo para obtener el id del grupo
    public function withGroup($group)
    {
        $row = $this->db->table('groups')->where('name_group', $group)->get()->getFirstRow();
        d($row);

        if ($row !== null) {
            $this->assignGroup = $row->group_id;
        }
    }
}
