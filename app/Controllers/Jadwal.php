<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;

class Jadwal extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new Post();
        $data = [
            'content' => $model->paginate(10, 'content'),
            'pages'   => 'Jadwal',
            'post'  => $model->pager,
        ];
        //dd($data);
        return view('jadwal/index', $data);
    }
}
