<?php

namespace App\Controllers;

class Lokasi extends BaseController
{
    protected $lokasiModel;
    public function __construct()
    {        
        $this->lokasiModel = new \App\Models\LokasiModel();
    }

    public function index()
    {
        $lokasi = $this->lokasiModel->findAll();
        
        $data = [
            'lokasi' =>$lokasi
        ];
        return view ('lokasi', $data);
   }
}


