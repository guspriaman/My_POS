<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController


{
    protected $produkModel;
    public function __construct()
    {
    //    $produkModel = new ProdukModel(); 
        $this->produkModel = new ProdukModel();
    }

    public function index()
    
    {
        // $produk = $this->produkModel->findAll();

        $data = [
    
            'produk' => $this->produkModel->getProduk()
        ];

        return view('produk/index', $data);

   }    

   public function detail($slug)
   {
       $data = [
        //    'title' =>'Detail Produk',
           'produk' => $this->produkModel->getProduk($slug)
        ];
        return view ('produk/detail', $data);
    }
    
    
    public function create()
    {
        // $data = [
        //     'title' => 'Form Tambah Data produk'
    // ];

    return view('produk/create');
   }




   public function save ()
   {    
        // $slug = url_title($this->request->getVar('nama_produk'), '-', true);
        $this->produkModel->save([
            'gambar_produk' => $this->request->getVar('gambar_produk'),
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'slug' => $this->request->getVar('slug'),
            'stok_produk' => $this->request->getVar('stok_produk')
        ]);

        return redirect()->to('/produk');
   }


}








