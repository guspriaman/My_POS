<?php 
namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'ketid';
    protected $allowedFields = ['ketid','ketnama'];

    public function cariData($cari)
    {
        return $this->table('kategori')->like('katnama', $cari);
    }

}

