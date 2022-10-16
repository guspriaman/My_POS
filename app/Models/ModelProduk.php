<?php 
namespace App\Models;

use CodeIgniter\Model;

class ModelProduk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'kodebarcode';
    protected $allowedFields = [
        'kodebarcode',
        'namaproduk',
        'produk_satid',
        'produk_katid',
        'stok_tersedia',
        'harga_beli',
        'harga_jual',
        'gambar'
    ];

    public function cariData($cari)
    {
        return $this->table('kategori')->like('katnama', $cari);
    }

}

