<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupsModel extends Model
{
    protected $table      = 'groups';
    protected $primaryKey = 'group_id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    protected $returnType     = User::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name_group'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
