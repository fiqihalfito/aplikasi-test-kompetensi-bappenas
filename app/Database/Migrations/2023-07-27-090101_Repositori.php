<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Repositori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'filename'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'unique'        => true
            ],
            'created_at' => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
                'default'        => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at' => [
                'type'           => 'TIMESTAMP',
                'null'           => true,
            ],
            'user_id'   => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('repositori');
    }

    public function down()
    {
        $this->forge->dropTable('repositori');
    }
}
