<?php 
namespace App\Models;

use CodeIgniter\Model;

class ModelPelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'pel_kode';
    protected $allowedFields = [
        'pel_kode',
        'pel_nama',
        'pel_alamat',
        'pel_telp'

    ];


  

    public function cariData($cari)

    {
        return $this->table('pelanggan')->like('pel_nama', $cari);
    }

}

