<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transaksi;
use App\Models\User;

class Transaction extends BaseController
{
    public function index()
    {
        helper('number');
        $pager = \Config\Services::pager();
        $model = new Transaksi();
        $data = [
            'content' => $model->getTransaksi(10),
            'pages'   => 'Data Tagihan',
            'pager'  => $model->pager,
        ];
        //dd($data);
        return view('transaksi/index', $data);
    }

    public function add()
    {
        $model = new User();
        $data = [
            'pages' => 'Add Tagihan',
            'content' => $model->findAll()
        ];
        return view('transaksi/add', $data);
    }

    public function store()
    {
        $model = new Transaksi();
        $data = [
            'id_user' => $this->request->getVar('id_user'),
            'tagihan' => $this->request->getVar('tagihan'),
            'status_transaksi' => 'BELUM BAYAR',
        ];
        $model->insert($data);
        session()->setFlashdata('success', 'Berhasil menambahkan tagihan!');
        return $this->response->redirect(site_url('dashboard/transaksi'));
    }

    public function edit($id = null)
    {
        $model = new Transaksi();
        $data = [
            'pages' => 'Edit Transaksi',
            'content' => $model->where('id_transaksi', $id)->first()
        ];
        //dd($data);
        return view('transaksi/edit', $data);
    }

    public function update()
    {
        $model = new Transaksi();
        $id = $this->request->getVar('id_transaksi');
        $data = [
            'status_transaksi' => $this->request->getVar('status_transaksi')
        ];
        $model->update($id, $data);
        session()->setFlashdata('success', 'Berhasil memperbarui tagihan!');
        return $this->response->redirect(site_url('dashboard/transaksi'));
    }   

    public function delete($id = null)
    {
        $model = new Transaksi();
        $model->where('id_transaksi', $id)->delete($id);
        session()->setFlashdata('success', 'Tagihan berhasil dihapus');
        return $this->response->redirect(site_url('dashboard/transaksi'));
    }
}
