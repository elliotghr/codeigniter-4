<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Categories extends BaseController
{
    public function index()
    {
        return view('Admin/categories');
    }
    public function create()
    {
        return view('Admin/categories_create');
    }
    public function store()
    {
        dd($this->request->getPost());
        // return view('Admin/posts');
    }
}
