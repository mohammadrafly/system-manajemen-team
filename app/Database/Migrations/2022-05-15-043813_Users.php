<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nomor_hp' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => 13,
            ],
            'ttl' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['laki-laki', 'perempuan'],
            ],
            'foto_diri' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'foto_akte' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'riwayat_penyakit' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['diterima', 'ditolak', 'pending'],
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
