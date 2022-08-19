<?php 
namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $useTimestamps = false;
    protected $cretedField = 'created';
    protected $updatedField = 'updated';

}

