<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\StrukturSSB;

class Dashboard extends BaseController
{
    public function index()
    {
        $model = new User();
        $data = [
            'pages' => 'Dashboard',
            'CABOR' => $model->CountAllBasedOnRoles(),
        ];
        return view('dashboard/index', $data);
    }

    public function strukturSSB()
    {
        $pager = \Config\Services::pager();
        $model = new StrukturSSB();
        $data = [
            'content' => $model->paginate(10, 'content'),
            'pages' => 'Struktur SSB',
            'pager'  => $model->pager,
        ];
        return view('struktur/index', $data);
    }

    public function strukturSSBsiswa()
    {
        $model = new StrukturSSB();
        $data = [
            'content'  => $model->get()->getResult(),
            'pages' => 'Struktur SSB'
        ];
        //dd($data);
        return view('struktur/siswa', $data);
    }

    public function add()
    {
        $data = [
            'pages' => 'Tambah Struktur',
        ];
        return view('struktur/add', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'picture' => [
                'rules' => 'mime_in[picture,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'mime_in'  => 'Maaf file yang anda upload memiliki format yang tidak diizinkan! silahkan upload dengan format JPG, JPEG, dan PNG.',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $img    = $this->request->getFile('picture');
        $randName = $img->getRandomName();

        if ($img->isValid() && ! $img->hasMoved()) {
            $img->move('post',$randName);
            $model = new StrukturSSB();
            $model->insert([
                'picture' => $randName,
            ]);
            session()->setFlashData('success','Berhasil menambah post');
            return redirect()->to('dashboard/strukturssb');
        } else {
            session()->setFlashData('error','Gagal menambahkan struktur');
            return redirect()->to('dashboard/strukturssb');
        }
    }

    public function delete($id = null)
    {
        $model = new SturkturSSB();
        $model->where('id', $id)->delete($id);
        session()->setFlashData('success', 'Struktur berhasil dihapus!');
        return $this->response->redirect(site_url('dashboard/strukturssb'));
    }
}
