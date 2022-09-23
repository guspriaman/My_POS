<?php 
namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table = 'item';
    protected $useTimestamps = true;
    protected $allowedFields = ['gambar_item','nama_item','slug','stok_item'];

    public function getItem($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

}





