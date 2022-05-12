<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserBackend;
use App\Models\UserPendaftar;

class Login extends BaseController
{
    public function index()
    {
        return view('Auth/Login');
    }

    public function loginKadet()
    {
        $admin = new UserPendaftar();
        $nomor_hp = $this->request->getVar('nomor_hp');
        $password = $this->request->getVar('password');
        $dataAdmin = $admin->where([
            'nomor_hp' => $nomor_hp,
        ])->first();
        if ($dataAdmin) {
            if (password_verify($password, $dataAdmin['password'])) {
                session()->set([
                    'nomor_hp' => $dataAdmin['nomor_hp'],
                    'password' => $dataAdmin['password'],
                    'id' => $dataAdmin['id'],
                    'nama' => $dataAdmin['nama'],
                    'created_at' => $dataAdmin['created_at'],
                    'WesLogin' => TRUE,
                ]);
                return redirect()->to(base_url('kadet'));
            } else {
                session()->setFlashdata('error', 'Nomor HP & Password Salah');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('error', 'Nomor HP & Password Salah');
            return redirect()->to('/');
        }
    }

    public function indexAdmin()
    {
        return view('AdminAuth/Login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
