<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Auth extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function Register()
    {
        return view('register');
    }

    public function Logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function LoginProced()
    {
        $model = new User();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            $konfirmasiPassword = password_verify($password, $pass);
            if ($konfirmasiPassword) {
                $setData = [
                    'id'        => $data['id'],
                    'username'  => $data['username'],
                    'nomor_hp'  => $data['nomor_hp'],
                    'role'      => $data['role'],
                    'nama'      => $data['nama'],
                    'foto_diri' => $data['foto_diri'],
                    'WesLogin'  => TRUE,
                ];
                session()->set($setData);
                return redirect()->to('dashboard');
            } else {
                session()->setFlashdata('error', 'Password salah!');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('error', 'username tidak ada di database!');
            return redirect()->to('/');
        }
    }

    public function RegisterProced()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[15]|is_unique[users.username]',
                'errors' => [
                    'required' => 'username harus diisi',
                    'min_length' => 'username minimal 4 Karakter',
                    'max_length' => 'username maksimal 15 Karakter',
                    'is_unique' => 'username sudah digunakan'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 4 Karakter',
                    'max_length' => 'Password maksimal 50 Karakter',
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
        $data = [
            'username'  => $this->request->getVar('username'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role'      => 'unset',
            'status'    => 'pending',
        ];
        $model->save($data);

        session()->setFlashdata('success', 'Anda telah berhasil daftar silahkan login.');
        return redirect()->to('/');
    }
}
