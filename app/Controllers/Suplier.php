<?php

namespace App\Controllers;

use App\Models\Modeldatasuplier;
use App\Models\Modelsuplier;

use Config\Services;

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



   public function listdata()
   {
       $request = Services::request();
       $datamodel = new Modeldatasuplier($request);
       if ($request->getMethod(true) == 'POST') {
           $lists = $datamodel->get_datatables();
           $data = [];
           $no = $request->getPost("start");
           foreach ($lists as $list) {
               $no++;
               $row = [];
                $tomboledit = "<button type=\"button\" class=\"btn btn-info btn-sm\" onclick=\"edit('". $list->nobp."')\">
                <i class=\"fa fa-tags\"></i></button>";
                $tombolhapus = "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"hapus('". $list->nobp."')\">
                <i class=\"fa fa-trash\"></i></button>";
                $tombolupload = "<button type=\"button\" class=\"btn btn-warning btn-sm\" onclick=\"upload('". $list->nobp."')\">
                <i class=\"fa fa-image\"></i></button>";

               $row[] = "<input type=\"checkbox\" name=\"nobp[]\" class=\"centangNobp\" value=\"$list->nobp\">";
               $row[] = $no;
               $row[] = $list->nobp;
               $row[] = $list->nama;
               $row[] = $list->taplahir;
               $row[] = $list->tgllahir;
               $row[] = $list->jenkel;
               $row[] = $list->prodinama;
               $row[] = $tomboledit. " ". $tombolhapus. " " . $tombolupload;
               $data[] = $row;
           }
           $output = [
               "draw" => $request->getPost('draw'),
               "recordsTotal" => $datamodel->count_all(),
               "recordsFiltered" => $datamodel->count_filtered(),
               "data" => $data
           ];
           echo json_encode($output);
       }
   }
// untuk upload file atau gambar

   public function formupload() {
    if ($this->request->isAJAX()) {
        $nobp = $this->request->getVar('nobp');
        $data = [
            'nobp' => $nobp 
        ];

        $msg = [
            'sukses' => view('suplier/modalupload', $data)
        ];
        echo json_encode($msg);
    }
   }

   public function doupload() {
    if ($this->request->isAJAX()) {
        $nobp = $this->request->getVar('nobp');
        $validation = \Config\Services::validation();


        if ($_FILES['foto']['name'] == NULL && $this->request->getpost('imagecam') == ''){
            $msg = ['error' => 'Silakan pilih salah satu yaaa'];
        }
        elseif ($_FILES['foto']['name'] == NULL){
            // cek dulu fotonya
            $cekdata = $this->spl->find($nobp);
            $fotolama = $cekdata['foto'];
            if($fotolama != NULL || $fotolama != "") {
                unlink ($fotolama);
            }

            $image = $this->request->getPost('imagecam');
            $image = str_replace('data:image/jpeg;base64,','',$image);
            $image = base64_decode($image, true);

            $filename = $nobp . '.jpg';
            file_put_contents(FCPATH. '/assets/images/foto/'. $filename
            , $image);

            $updatedata = [
                'foto' => './assets/images/foto/'. $filename
            ];
            $this->spl->update($nobp, $updatedata);

            $msg = [
                'sukses'=> 'Berhasil diupload'
            ];


         } else {

                $valid = $this->validate([
                    'foto' => [
                        'label' => 'upload Foto',
                        'rules' => 'uploaded[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]|is_image[foto]',
                        'errors' => [
                            'uploaded' => '{field} wajib diisi',
                            'mime_in' => 'Harus dalam bentuk gambar, jangan file yang lain'
                        ]
                    ]
                ]);
                if(!$valid) {
                    $msg = [
                        'error' => [
                            'foto' => $validation->getError('foto')
                        ]
                    ];
                    
        
                }else{
                    // cek dulu fotonya
                    $cekdata = $this->spl->find($nobp);
                    $fotolama = $cekdata['foto'];
                    if($fotolama != NULL || $fotolama != "") {
                        unlink ($fotolama);
                    }


                    $filefoto = $this->request->getFile('foto');
        
                    $filefoto->move('assets/images/foto', $nobp. '.' . $filefoto->getExtension());
                    
                    $updatedata = [
                        'foto' => './assets/images/foto/'. $filefoto->getName()
                    ];
                    $this->spl->update($nobp, $updatedata);
        
                    $msg = [
                        'sukses'=> 'Berhasil diupload'
                    ];
        
                }
                
                $valid = $this->validate([
                    'foto' => [
                        'label' => 'Upload Foto',
                        'rules' => '	uploaded[foto]|mime_in[foto,image/png,image/jpg]|is_image[foto]',
                        'errors' => [
                            'uploaded' => '{field} wajib diisi',
                            'mime_in' => 'Harus dalam bentuk gambar, jangan file yang lain'
                        ]
                    ]
                ]);    
            }


            echo json_encode($msg);



    }
   }
}



