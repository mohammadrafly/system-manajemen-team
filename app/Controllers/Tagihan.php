<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transaksi;

class Tagihan extends BaseController
{
    public function index($id = null)
    {
        helper('number');
        $pager = \Config\Services::pager();
        $model = new Transaksi();
        $content = $model->getTransaksiByIDuser($id, 10);
        $data = [
            'content' => $content,
            'pages'   => 'Tagihan',
            'user'    => $id,
            'pager'   => $model->pager
        ];
        //dd($data);
        return view('tagihan/index', $data);
    }
}
