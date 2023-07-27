<?php

namespace App\Models;

use CodeIgniter\Model;

class RepositoriModel extends Model
{
    protected $table = 'repositori';
    protected $allowedFields = ['title', 'slug', 'filename', 'updated_at', 'user_id'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getRepositori($id = false)
    {
        if ($id === false) {
            return $this->where('user_id', session()->get('id'))->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
