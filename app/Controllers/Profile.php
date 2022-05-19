<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Profile extends BaseController
{
    public function index($id)
    {
        $model = new User();
        $data = [
            'content' => $model->where('id', $id)->first(),
            'pages' => 'Profile Saya',
        ];
        return view('profile/index', $data);
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
            'foto_diri' => [
                'rules' => 'mime_in[foto_diri,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'mime_in'  => 'Maaf file yang anda upload memiliki format yang tidak diizinkan! silahkan upload dengan format JPG, JPEG, dan PNG.',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $img    = $this->request->getFile('foto_diri');
        $randName = $img->getRandomName();

        if ($img->isValid() && ! $img->hasMoved()) {
            $img->move('profile',$randName);
            $model = new User();
            $id = $this->request->getVar('id');
            $data = [
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'nomor_hp' => $this->request->getVar('nomor_hp'),
                'foto_diri' => $randName,
            ];
            $model->update($id, $data);
            session()->setFlashData('success','Detail akun berhasil diupdate!');
            return $this->response->redirect(site_url('dashboard/profile/saya/'.$id));
        } else {
            $model = new User();
            $id = $this->request->getVar('id');
            $data = [
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'nomor_hp' => $this->request->getVar('nomor_hp'),
            ];
            $model->update($id, $data);
            session()->setFlashData('success','Detail akun berhasil diupdate!');
            return $this->response->redirect(site_url('dashboard/profile/saya/'.$id));
        }
    }
}
