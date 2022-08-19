<?php

namespace App\Controllers;

class Produk extends BaseController


{
    protected $produkModel;
    public function __construct()
    {
        
        // $this->barangModel = new BarangModel();
        $this->produkModel = new \App\Models\ProdukModel();
    }
    public function index()
    {
        $produk = $this->produkModel->findAll();

        $data = [
            'produk' =>$produk
        ];

        return view('produk', $data);




   }    
}








