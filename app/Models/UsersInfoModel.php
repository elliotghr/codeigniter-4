<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\UserInfo;

class UsersInfoModel extends Model
{
    protected $table            = 'info_users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    // Traemos los datos por la clase de la entidad UserInfo
    protected $returnType       = UserInfo::class;
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['user_id', 'name', 'surname', 'country_id'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
