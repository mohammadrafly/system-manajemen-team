<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transaction';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tagihan',
        'id_user',
        'status_transaksi'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getTransaksi(int $id)
    {
        return $this->select()
            ->join('users', 'transaction.id_user = users.id')
            ->paginate($id);
    }

    public function getTransaksiByID(int $id)
    {
        $query = $this->db->table('transaction')
            ->join('users', 'users.id = transaction.id_user', 'left')
            ->where('transaction.id_transaksi', $id)
            ->get();
        return $query;
    }

    
    public function getTransaksiByIDuser(int $id,int $pager)
    {
        return $this->select()
            ->join('users', 'transaction.id_user = users.id')
            ->where('transaction.id_user', $id)
            ->paginate($pager);
    }
}
