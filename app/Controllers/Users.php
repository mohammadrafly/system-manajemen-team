<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Users extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new User();
        $data = [
            'content' => $model->paginate(10, 'content'),
            'pages'   => 'Data Users',
            'pengguna'  => $model->pager,
        ];
        //dd($data);
        return view('user/index', $data);
    }

    public function add()
    {
        $data = [
            'pages' => 'Tambah User'
        ];
        return view('user/add', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[4]|max_length[55]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 55 Karakter',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'nomor_hp' => [
                'rules' => 'is_unique[users.nomor_hp]',
                'errors' => [
                    'is_unique' => '{field} sudah digunakan sebelumnya',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[35]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 35 Karakter',
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi password tidak sesuai dengan password di atas',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new User();
        $model->insert([
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'role' => $this->request->getVar('role'),
            'nomor_hp' => $this->request->getVar('nomor_hp'),
            'gender' => $this->request->getVar('gender'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
        ]);
        session()->setFlashData('success','Berhasil menambah User');
        return redirect()->to('dashboard/user');
    }

    public function edit($id)
    {
        $model = new User();
        $data = [
            'data' => $model->where('id', $id)->first(),
            'pages'=> 'Edit User',
        ];
        return view('user/edit', $data);
    }

    public function update()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[4]|max_length[55]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 55 Karakter',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                ]
            ],
            'nomor_hp' => [
                'rules' => 'required|min_length[11]|max_length[13]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 11 Karakter',
                    'max_length' => '{field} Maksimal 13 Karakter',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'error' => [
                    'required' => '{field} harus diisi',
                ],
            ],
            'gender' => [
                'rules' => 'required',
                'error' => [
                    'required' => '{field} harus diisi',
                ],
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $model = new User();
        $id = $this->request->getVar('id');
        $data = [
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'nomor_hp' => $this->request->getVar('nomor_hp'),
            'gender' => $this->request->getVar('gender'),
            'role' => $this->request->getVar('role'),
        ];
        $model->update($id, $data);
        session()->setFlashData('success','User berhasil diupdate!');
        return $this->response->redirect(site_url('dashboard/user'));
    }

    public function delete($id = null)
    {
        $model = new User();
        $model->where('id', $id)->delete($id);
        session()->setFlashData('success', 'User berhasil dihapus!');
        return $this->response->redirect(site_url('dashboard/user'));
    }
}
