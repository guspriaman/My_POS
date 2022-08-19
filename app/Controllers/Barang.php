<?php

namespace App\Controllers;

class Barang extends BaseController


{
    protected $barangModel;
    public function __construct()
    {
        
        // $this->barangModel = new BarangModel();
        $this->barangModel = new \App\Models\BarangModel();
    }
    public function index()
    {
        $barang = $this->barangModel->findAll();

        $data = [
            'barang' =>$barang
        ];

        return view('barang', $data);




   }    
}








