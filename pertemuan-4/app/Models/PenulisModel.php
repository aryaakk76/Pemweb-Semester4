<?php

namespace App\Models;

use CodeIgniter\Model;

class PenulisModel extends Model
{
    //bisa dilihat pada vendor/codeigniter4/system/Model.php
    protected $table = 'penulis';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'address'];

    public function search($kataKunci)
    {
        return $this->table('penulis')->like('name', $kataKunci)->orLike('address', $kataKunci);
    }
}
