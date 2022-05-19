<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Kandidat extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new User();
        $data = [
            'content' => $model->paginate(10, 'content'),
            'pages'   => 'Seleksi Kandidat',
            'pengguna'  => $model->pager,
        ];
        //dd($data);
        return view('kandidat/index', $data);
    }

    public function edit($id = null)
    {
        $model = new User();
        $data = [
            'data' => $model->where('id', $id)->first(),
            'pages' => 'Seleksi Kandidat',
        ];
        return view('kandidat/edit', $data);
    }

    public function update()
    {
        $model = new User();
        $id = $this->request->getVar('id');
        $data = [
            'status' => $this->request->getVar('status'),
            'note' => $this->request->getVar('note'),
            'role' => $this->request->getVar('role')
        ];
        $model->update($id, $data);
        session()->setFlashData('success','Kandidat berhasil diupdate!');
        return $this->response->redirect(site_url('dashboard/kandidat'));
    }
}