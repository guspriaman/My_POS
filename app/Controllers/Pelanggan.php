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




    // public function simpandata()
    // {
    //     if ($this->request->isAJAX()) {
    //         $pel_kode = $this->request->getVar('pel_kode');
    //         $pel_nama = $this->request->getVar('pel_nama');
    //         $pel_alamat = $this->request->getVar('pel_alamat');
    //         $pel_telp = $this->request->getVar('pel_telp');

    //         $validation =  \Config\Services::validation();

    //         $doValid = $this->validate([
    //             'pel_kode' => [
    //                 'label' => 'Kode Pelanggan',
    //                 'rules' => 'is_unique[pelanggan.pel_kode]|required',
    //                 'errors' => [
    //                     'is_unique' => '{field} sudah ada, coba dengan kode yang lain',
    //                     'required' => '{field} tidak boleh kosong'
    //                 ]
    //             ],
    //             'pel_nama' => [
    //                 'label' => 'Nama Pelanggan',
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} tidak boleh kosong'
    //                 ]
    //             ],
    //             'pel_alamat' => [
    //                 'label' => 'Alamat Pelanggan',
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} tidak boleh kosong'
    //                 ]
    //             ],
    //             'pel_telp' => [
    //                 'label' => 'Telepon Pelanggan',
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} tidak boleh kosong'
    //                 ]
    //             ],
                
    //         ]);

    //         if (!$doValid) {
    //             $msg = [
    //                 'error' => [
    //                     'errorPelKode' => $validation->getError('pel_kode'),
    //                     'errorPelNama' => $validation->getError('pel_nama'),
    //                     'errorPelAlamat' => $validation->getError('pel_alamat'),
    //                     'errorPeltelp' => $validation->getError('pel_telp'),
    //                 ]
    //             ];
    //             $this->pelanggan->insert([
    //                 'pel_kode' => $pel_kode,
    //                 'pel_nama' => $pel_nama,
    //                 'pel_alamat' => $pel_alamat,
    //                 'pel_telp' => $pel_telp,
    //             ]);

    //             $msg = [
    //                 'sukses' => 'Berhasil dieksekusi'
    //             ];
    //         }

    //         echo json_encode($msg);
    //     }
    // }

    function formTambah()
    {
        if ($this->request->isAJAX()) {
            $aksi = $this->request->getPost('aksi');
            $msg = [
                'data' => view('pelanggan/modalformtambah', ['aksi' => $aksi])
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak ada halaman yang bisa ditampilkan');
        }
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
                    'sukses' => 'Pelanggan berhasil ditambahkan'
                ];
                echo json_encode($msg);
            }
        }

    }

}