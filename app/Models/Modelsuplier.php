<?php 
namespace App\Models;

use CodeIgniter\Model;

class Modelsuplier extends Model
   {
      protected $table ='suplier';
      protected $primaryKey = 'nobp'; 

      protected $allowedFields = ['nobp','nama','taplahir','tgllahir','jenkel', 'foto'];

   }


   
