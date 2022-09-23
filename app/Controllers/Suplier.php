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
}



