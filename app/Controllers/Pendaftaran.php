<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Pendaftaran extends BaseController
{
    public function index($id = null)
    {
        $model = new User();
        $data = [
            'content' => $model->where('id', $id)->first(),
            'pages' => 'Pendaftaran',
        ];
        return view('pendaftaran/index', $data);
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
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'posisi_pemain' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'riwayat_penyakit' => [
                'rules' => 'mime_in[foto_diri,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'mime_in'  => 'Maaf file yang anda upload memiliki format yang tidak diizinkan! silahkan upload dengan format JPG, JPEG, dan PNG.',
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
            'ttl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'foto_akte' => [
                'rules' => 'mime_in[foto_diri,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'mime_in'  => 'Maaf file yang anda upload memiliki format yang tidak diizinkan! silahkan upload dengan format JPG, JPEG, dan PNG.',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        //foto_diri
        $foto_diri     = $this->request->getFile('foto_diri');
		$randNameFD = $foto_diri->getRandomName();
        if ($foto_diri->isValid() && ! $foto_diri->hasMoved())
        {
            $foto_diri->move('profile',$randNameFD);
            session()->setFlashData('message','Berhasil upload');
        }else{
            session()->setFlashData('message','Gagal upload');
        }
        //foto_akte
        $foto_akte     = $this->request->getFile('foto_akte');
		$randNameAK = $foto_akte->getRandomName();
        if ($foto_akte->isValid() && ! $foto_akte->hasMoved())
        {
            $foto_akte->move('profile',$randNameAK);
            session()->setFlashData('message','Berhasil upload');
        }else{
            session()->setFlashData('message','Gagal upload');
        }
        //riwayat penyakit
        $riwayat_penyakit     = $this->request->getFile('riwayat_penyakit');
		$randNamePE = $riwayat_penyakit->getRandomName();
        if ($riwayat_penyakit->isValid() && ! $riwayat_penyakit->hasMoved())
        {
            $riwayat_penyakit->move('profile',$randNamePE);
            session()->setFlashData('message','Berhasil upload');
        }else{
            session()->setFlashData('message','Gagal upload');
        }

        $model = new User();
        $id = $this->request->getVar('id');
        $data = [
            'nama' => $this->request->getVar('nama'),
            'ttl' => $this->request->getVar('ttl'),
            'gender' => $this->request->getVar('gender'),
            'posisi_pemain' => $this->request->getVar('posisi_pemain'),
            'nomor_hp' => $this->request->getVar('nomor_hp'),
            'foto_diri' => $randNameFD,
            'foto_akte' => $randNameAK,
            'riwayat_penyakit' => $randNamePE
        ];
        $model->update($id, $data);
        session()->setFlashData('success','Pendaftaran anda berhasil silahkan tunggu 1x24 jam, terimakasih!');
        return $this->response->redirect(site_url('dashboard/pendaftaran/id/'.$id));
        
    }
}
