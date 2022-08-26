<?php

namespace App\Controllers;

use App\Models\ModelKategori;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->kategori = new ModelKategori();
    }
    public function index()
    {

        $tombolCari = $this->request->getPost('tombolkategori');
        if(isset($tombolCari)) {
            $cari = $this->request->getPost('carikategori');
            session()->set('carikategori', '$cari');
            redirect()->to('/kategori/index');

        }else{
            $cari = session()->get('carikategori');

        }
        $dataKategori = $cari ? $this->kategori->cariData($cari) : $this->kategori;




        $noHalaman= $this->request->getVar('page_kategori') ? $this->request->getVar('page_kategori') : 1;
        $data = [
            'datakategori' => $dataKategori->paginate(5,'kategori'),
            'pager' => $this->kategori->pager,
            'nohalaman' => $noHalaman
        
        ];
        return view('kategori/data',$data);
   }

   public function formTambah() {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('kategori/modalformtambah')
            ];
            echo json_encode($msg);
            
        }else {
            exit('maaf tidak ada halaman yang bisa ditampilkan');
        }
   }
}



