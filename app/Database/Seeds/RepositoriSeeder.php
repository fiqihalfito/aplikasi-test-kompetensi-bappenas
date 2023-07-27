<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RepositoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Berkas 1',
                'filename' => 'berkas_1.docx',
                'user_id' => 1
            ],
            [
                'title' => 'Berkas 2',
                'filename' => 'berkas_2.docx',
                'user_id' => 1
            ],
            [
                'title' => 'Berkas 3',
                'filename' => 'berkas_3.docx',
                'user_id' => 2
            ],
        ];

        // Using Query Builder
        $this->db->table('repositori')->insertBatch($data);
    }
}
