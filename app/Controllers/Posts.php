<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;

class Posts extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new Post();
        $data = [
            'content' => $model->paginate(10, 'content'),
            'pages'   => 'Data Posts',
            'post'  => $model->pager,
        ];
        //dd($data);
        return view('post/index', $data);
    }

    public function add()
    {
        $data = [
            'pages' => 'Tambah Post',
        ];
        return view('post/add', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'required|min_length[4]|max_length[55]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 55 Karakter',
                ]
            ],
            'pict' => [
                'rules' => 'mime_in[pict,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'mime_in'  => 'Maaf file yang anda upload memiliki format yang tidak diizinkan! silahkan upload dengan format JPG, JPEG, dan PNG.',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $img    = $this->request->getFile('pict');
        $randName = $img->getRandomName();

        if ($img->isValid() && ! $img->hasMoved()) {
            $img->move('post',$randName);
            $model = new Post();
            $model->insert([
                'title' => $this->request->getVar('title'),
                'content' => $this->request->getVar('content'),
                'pict' => $randName,
                'category' => $this->request->getVar('category'),
                'waktu' => $this->request->getVar('waktu'),
            ]);
            session()->setFlashData('success','Berhasil menambah post');
            return redirect()->to('dashboard/post');
        } else {
            $model = new Post();
            $model->insert([
                'title' => $this->request->getVar('title'),
                'content' => $this->request->getVar('content'),
                'category' => $this->request->getVar('category'),
                'waktu' => $this->request->getVar('waktu'),
            ]);
            session()->setFlashData('success','Berhasil menambah post');
            return redirect()->to('dashboard/post');
        }
    }

    public function edit($id = null)
    {
        $model = new Post();
        $data = [
            'data' => $model->where('id', $id)->first(),
            'pages'=> 'Edit Post',
        ];
        return view('post/edit', $data);
    }

    public function update()
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'required|min_length[4]|max_length[55]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 55 Karakter',
                ]
            ],
            'pict' => [
                'rules' => 'mime_in[pict,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                'errors' => [
                    'mime_in'  => 'Maaf file yang anda upload memiliki format yang tidak diizinkan! silahkan upload dengan format JPG, JPEG, dan PNG.',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $img    = $this->request->getFile('pict');
        $id     = $this->request->getVar('id');
        $randName = $img->getRandomName();

        if ($img->isValid() && ! $img->hasMoved()) {
            $img->move('post',$randName);
            $model = new post();
            $data = [
                'title' => $this->request->getVar('title'),
                'content' => $this->request->getVar('content'),
                'category' => $this->request->getVar('category'),
                'waktu' => $this->request->getVar('waktu'),
                'pict' => $randName,
            ];
            $model->update($id, $data);
            session()->setFlashData('success','Post berhasil diupdate!');
            return $this->response->redirect(site_url('dashboard/post'));
        } else {
            $model = new post();
            $data = [
                'title' => $this->request->getVar('title'),
                'content' => $this->request->getVar('content'),
                'category' => $this->request->getVar('category'),
                'waktu' => $this->request->getVar('waktu'),
            ];
            $model->update($id, $data);
            session()->setFlashData('success','Post berhasil diupdate!');
            return $this->response->redirect(site_url('dashboard/post'));
        }


    }

    public function delete($id = null)
    {
        $model = new Post();
        $model->where('id', $id)->delete($id);
        session()->setFlashData('success', 'post berhasil dihapus!');
        return $this->response->redirect(site_url('dashboard/post'));
    }
}
