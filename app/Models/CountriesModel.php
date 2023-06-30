<?php

namespace App\Models;

use CodeIgniter\Model;

class CountriesModel extends Model
{
    protected $table            = 'countries';
    protected $primaryKey       = 'country_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['name'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
