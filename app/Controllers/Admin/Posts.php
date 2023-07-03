<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Posts extends BaseController
{
    public function index()
    {
        return view('Admin/posts');
    }
}
