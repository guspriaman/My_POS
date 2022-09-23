<?php 
namespace App\Models;

use CodeIgniter\Model;

class ModelCustomer extends Model
{
    protected $table = 'customer';
    // protected $primaryKey = 'ketid';
    protected $allowedFields = ['id','namacustomer','alamatcustomer','ket'];

    public function cariData($cari)
    {
        return $this->table('customer')->like('namacustomer', $cari);
    }
}




