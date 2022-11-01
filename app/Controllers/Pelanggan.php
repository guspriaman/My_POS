<?php

namespace App\Controllers;

use App\Models\Modelpelanggan;
use App\Models\Modelkategori;
use App\Models\Modelsatuan;
use PhpParser\Node\Stmt\Echo_;

class Pelanggan extends BaseController
{
    public function __construct()
    {
        $this->pelanggan = new Modelpelanggan();
        $this->db = db_connect();
    }
    public function index()
    {

        $tombolCari = $this->request->getPost('tombolcaripelanggan');

        if (isset($tombolCari)) {
            $cari = $this->request->getPost('caripelanggan');
            session()->set('caripelanggan', $cari);
            redirect()->to('/pelanggan/index');
        } else {
            $cari = session()->get('caripelanggan');
        }

        $dataPelanggan = $cari ? $this->pelanggan->cariData($cari) : $this->pelanggan;

        $noHalaman = $this->request->getVar('page_Pelanggan') ? $this->request->getVar('page_pelanggan') : 1;
        $data = [
            'datapelanggan' => $dataPelanggan->paginate(10, 'pelanggan'),
            'pager' => $this->pelanggan->pager,
            'nohalaman' => $noHalaman,
            'cari' => $cari
        ];
        return view('pelanggan/data', $data);


        
     }

    public function add()
    {
        return view('pelanggan/formtambah');
    }




    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            $pel_kode = $this->request->getVar('pel_kode');
            $pel_nama = $this->request->getVar('pel_nama');
            $pel_alamat = $this->request->getVar('pel_alamat');
            $pel_telp = $this->request->getVar('pel_telp');

            $validation =  \Config\Services::validation();

            $doValid = $this->validate([
                'pel_kode' => [
                    'label' => 'Kode Pelanggan',
                    'rules' => 'is_unique[pelanggan.pel_kode]|required',
                    'errors' => [
                        'is_unique' => '{field} sudah ada, coba dengan kode yang lain',
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'pel_nama' => [
                    'label' => 'Nama Pelanggan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'pel_alamat' => [
                    'label' => 'Alamat Pelanggan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'pel_telp' => [
                    'label' => 'Telepon Pelanggan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                
            ]);

            if (!$doValid) {
                $msg = [
                    'error' => [
                        'errorPelKode' => $validation->getError('pel_kode'),
                        'errorPelNama' => $validation->getError('pel_nama'),
                        'errorPelAlamat' => $validation->getError('pel_alamat'),
                        'errorPeltelp' => $validation->getError('pel_telp'),
                    ]
                ];
                $this->pelanggan->insert([
                    'pel_kode' => $pel_kode,
                    'pel_nama' => $pel_nama,
                    'pel_alamat' => $pel_alamat,
                    'pel_telp' => $pel_telp,
                ]);

                $msg = [
                    'sukses' => 'Berhasil dieksekusi'
                ];
            }

            echo json_encode($msg);
        }
    }
    // public function hapus()
    // {

    //     if ($this->request->isAJAX()) {
    //         $kodebarcode= $this->request->getPost('kode');
            
    //         $this->pelanggan->delete($kodebarcode);
    //         $msg = [
    //           'sukses' => 'pelanggan berhasil dihapus'  
    //         ];
    //             echo json_encode($msg);
    //     }

    // }
    // public function edit($kode)
    // {
    //     $row = $this->pelanggan->find($kode);

    //     if ($row) {
    //         $data = [
    //             'kode' => $row['kodebarcode'],
    //             'nama' => $row['namapelanggan'],
    //             'stok' => $row['stok_tersedia'],
    //             'pelanggankategori' => $row['pelanggan_katid'],
    //             'datakategori' => $this->kategori->findAll(),
    //             'pelanggansatuan' => $row['pelanggan_satid'],
    //             'datasatuan' => $this->satuan->findAll(),
    //             'hargabeli'=> $row['harga_beli'],
    //             'hargajual'=> $row['harga_jual'],
    //             'gambarpelanggan' => $row['gambar']

    //         ];
    //         return view('pelanggan/formedit', $data);
    //     } else {
    //              {
    //                 exit('data tidak ditemukan');
    //              }
            
    //     }
    // }

    // public function updatedata()
        // {
        //     if ($this->request->isAJAX()) {
        //         $kodebarcode = $this->request->getVar('kodebarcode');
        //         $namapelanggan = $this->request->getVar('namapelanggan');
        //         $stok = $this->request->getVar('stok');
        //         $kategori = $this->request->getVar('kategori');
        //         $satuan = $this->request->getVar('satuan');
        //         $hargabeli = str_replace(',', '', $this->request->getVar('hargabeli'));
        //         $hargajual = str_replace(',', '', $this->request->getVar('hargajual'));
    
        //         $validation =  \Config\Services::validation();
    
        //         $doValid = $this->validate([
                 
        //             'namapelanggan' => [
        //                 'label' => 'Nama Pelanggan',
        //                 'rules' => 'required',
        //                 'errors' => [
        //                     'required' => '{field} tidak boleh kosong'
        //                 ]
        //             ],
                    
           
        //             'uploadgambar' => [
        //                 'label' => 'Upload Gambar',
        //                 'rules' => 'mime_in[uploadgambar,image/png,image/jpg,image/jpeg]|ext_in[uploadgambar,png,jpg,jpeg]|is_image[uploadgambar]',
        //             ]
        //         ]);
    
        //         if (!$doValid) {
        //             $msg = [
        //                 'error' => [
        //                     'errorNamaPelanggan' => $validation->getError('namapelanggan'),
        //                     'errorUpload' => $validation->getError('uploadgambar')
        //                 ]
        //             ];
        //         } else {
        //             $fileUploadGambar = $_FILES['uploadgambar']['name'];
                    
        //             // jika tidak mau ganti gambar , maka tetep pake gambar ya lama
        //             $rowDataPelanggan = $this->pelanggan->find($kodebarcode);

        //             if ($fileUploadGambar != NULL) {
        //                 unlink($rowDataPelanggan['gambar']);
        //                 $namaFileGambar = "$kodebarcode-$namapelanggan";
        //                 $fileGambar = $this->request->getFile('uploadgambar');
        //                 $fileGambar->move('assets/upload', $namaFileGambar . '.' . $fileGambar->getExtension());

        //                 $pathGambar = 'assets/upload/' . $fileGambar->getName();
        //             } else {
        //                 $pathGambar = $rowDataPelanggan['gambar'];
        //             }
    
        //             $this->pelanggan->update($kodebarcode,[
        //                 'namapelanggan' => $namapelanggan,
        //                 'pelanggan_satid' => $satuan,
        //                 'pelanggan_katid' => $kategori,
        //                 'stok_tersedia' => $stok,
        //                 'harga_beli' => $hargabeli,
        //                 'harga_jual' => $hargajual,
        //                 'gambar' => $pathGambar
        //             ]);
    
        //             $msg = [
        //                 'sukses' => 'Berhasil diupdate'
        //             ];
        //         }
    
        //         echo json_encode($msg);
        //     }
        // }  
    

}