<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'username' => 'lidia',
                'password' => password_hash('lidia123', PASSWORD_DEFAULT),
                'admin' => 1
            ]
        ];

        $this->db->table('proiect2.users')->insertBatch($data);
    }
}
