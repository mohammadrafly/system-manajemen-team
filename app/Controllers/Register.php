<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserPendaftar;

class Register extends BaseController
{
    public function index()
    {
        return view('Auth/Register');
    }

    public function registerProced()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                ]
            ],
            'nomor_hp' => [
                'rules' => 'required|min_length[11]|max_length[13]|is_unique[user_pendaftar.nomor_hp]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 11 Karakter',
                    'max_length' => '{field} Maksimal 13 Karakter',
                    'is_unique' => 'Nomor sudah digunakan sebelumnya',

                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[255]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 255 Karakter',
                ]
            ],
            'conf_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'matches' => 'Password tidak sama! silahkan cek kembali form anda.',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $user = new UserPendaftar();
        $user->insert([
            'nama' => $this->request->getVar('nama'),
            'nomor_hp' => $this->request->getVar('nomor_hp'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'status' => 'hold'
        ]);
        session()->setFlashData('message','Selamat akun anda telah dibuat, silahkan login!');
        return redirect()->to('/');
    }
}
