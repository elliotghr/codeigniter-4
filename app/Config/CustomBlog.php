<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class CustomBlog extends BaseConfig
{
    // En lugar de pasar el id pasamos el nombre del campo, CI buscará la coincidencia y lo adaptará
    public $default_group_users  = 'user';
    public $regPerPage  = 10;
}
