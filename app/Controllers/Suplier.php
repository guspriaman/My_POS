<?php

namespace App\Controllers;

use App\Models\Modelsuplier;

class Suplier extends BaseController
{
    public function index()
    {   
        
        return view('suplier/index');
   }


   public function ambildata() {
    if($this->request->isAJAX()) {
        $spl = new Modelsuplier;
        $data = [
            'tampildata' => $spl->findAll()
        ];
        $msg = [
            'data' => view('suplier/datasuplier', $data)
        ];
        echo json_encode($msg);

        }else {
            exit('Maaf tidak dapat proses');
        }
   }

   public function formtambah() {
    if($this->request->isAJAX()) {
        $msg = [
            'data' => view('suplier/modaltambah')
        ];
        echo json_encode($msg);

        }else {
            exit('Maaf tidak dapat proses');
        }
    
   }
   public function simpandata() {
    if($this->request->isAJAX()) {
        $validation = \config\Services::validation();

        $valid = $this->validate([
            'nobp' => [
                'label' => 'Nomor BP',
                'rules' => 'required|is_unique[suplier.nobp]',
                'errors' => [
                    'required' => '{field}  tidak boleh kosong',
                    'is_unique' => '{field}  tidak boleh sama, coba yang lain',

                ]
            ],
            'nama' => [
                'label' => 'Nama Suplier',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field}  tidak boleh kosong',

                ]
                ],
            'taplahir' => [
                'label' => 'Tempat Lahir Suplier',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field}  tidak boleh kosong',

                ]
            ],
            'tgllahir' => [
                'label' => 'Tgl Lahir Suplier',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field}  tidak boleh kosong',

                ]
            ],
            'jenkel' => [
                'label' => 'Jenis Kelamin Suplier',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field}  tidak boleh kosong',

                ]
            ]

        ]);









        if(!$valid) {
            $msg = [
                'error' => [
                    'nobp' => $validation->getError('nobp'),
                    'nama' => $validation->getError('nama'),
                    'taplahir' => $validation->getError('taplahir'),
                    'tgllahir' => $validation->getError('tgllahir'),
                    'jenkel' => $validation->getError('jenkel')

                ]
            ];
            } else {
                $simpandata = [
                    'nobp' => $this->request->getVar('nobp'),
                    'nama' => $this->request->getVar('nama'),
                    'taplahir' => $this->request->getVar('taplahir'),
                    'tgllahir' => $this->request->getVar('tgllahir'),
                    'jenkel' => $this->request->getVar('jenkel'),
                ];
                $spl = new Modelsuplier;
                $spl->insert($simpandata);
                $msg =[
                    'sukses' => 'Data suplier berhasil disimpan'
                ];


            
            
            }
            echo json_encode($msg);


        } else {
            exit('Maaf tidak dapat proses');
        }
   }


   

   
   public function formedit()
   {
        if ($this->request->isAJAX()) {
            $nobp = $this->request->getVar('nobp');
            // $spl = new Modelsuplier;
            $s = $this->spl->find($nobp);

            $data = [
                'nobp' => $s['nobp'],
                'nama' => $s['nama'],
                'taplahir' => $s['taplahir'],
                'tgllahir' => $s['tgllahir'],
                'jenkel' => $s['jenkel'],

            ];

            $msg = [
                'sukses' => view('suplier/modaledit', $data)
            ];

            echo json_encode($msg);

        }
   }

   public function updatedata ()
   {
        if($this->request->isAJAX()) {
      
                $simpandata = [
                    'nama' => $this->request->getVar('nama'),
                    'taplahir' => $this->request->getVar('taplahir'),
                    'tgllahir' => $this->request->getVar('tgllahir'),
                    'jenkel' => $this->request->getVar('jenkel'),
                ];
                $nobp = $this->request->getVar('nobp');

                $this->spl->update($nobp, $simpandata);
                $msg =[
                    'sukses' => 'Data suplier berhasil diupdate'
                ];
                echo json_encode($msg);


        } else {
            exit('Maaf tidak dapat proses');
        }
   }

   public function hapus () 
   {
    if($this->request->isAJAX()) {
        $nobp = $this->request->getVar('nobp');

        
        $this->spl->delete($nobp);
        $msg =[
            'sukses' => "Suplier dengan nobp $nobp berhasil dihapus"
        ];
        echo json_encode($msg);

    }
   }

   public function formtambahbanyak()
   {
        if($this->request->isAJAX()) {
            $msg =[
                'data' => view('Suplier/formtambahbanyak')
            ];
            echo json_encode($msg);
        }
   }


   public function simpandatabanyak()
   {
    if ($this->request->isAJAX()) {
        $nobp = $this->request->getVar('nobp');
        $nama = $this->request->getVar('nama');
        $taplahir = $this->request->getVar('taplahir');
        $tgllahir = $this->request->getVar('tgllahir');
        $jenkel = $this->request->getVar('jenkel');
        $jmldata = count($nobp);

        for($i = 0; $i < $jmldata; $i++ ) {
            $this->spl->insert([
                'nobp' => $nobp[$i],
                'nama' => $nama[$i],
                'taplahir' => $taplahir[$i],
                'tgllahir' => $tgllahir[$i],
                'jenkel' => $jenkel[$i],
            ]);
        }

        $msg = [
            'sukses' => "$jmldata data berhasil disimpan"

        ];
        echo json_encode($msg);

    }
   }


   public function hapusbanyak()
   {
        if($this->request->isAJAX()) {
            $nobp = $this->request->getVar('nobp');
            $jmldata = count($nobp);
            for ($i = 0; $i < $jmldata; $i++ ) {
                $this->spl->delete($nobp[$i]);
            }
            $msg = [
                'sukses' => "$jmldata data Suplier berhasil dihapus"
            ];

            echo json_encode($msg);
            
        }
   }
}



