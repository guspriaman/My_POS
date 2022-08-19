<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        echo view("registrasi");
     
    }

    public function login()
    {
        echo view("login");
    }




     
    // public function registrasi()
	// {
    //     $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
    //         'required' => 'Nama Belum diis!!',
    //         'errors' => 'Email Tidak Bener'
    //     ]);
    //     $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.email]', [
    //         'valid_email' => 'Email Tidak Benar!!',
    //         'required' => 'Email Belum diisi!!',
    //         'is_unique' => 'Email Sudah Terdaftar!',
    //         'errors' => 'Email Tidak Bener'
    //     ]);

    //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
    //         'matches' => 'Password Tidak Sama!!',
    //         'min_length' => 'Password Terlalu Pendek',
    //         'errors' => [
    //             'min_length' => 'Password Terlalu Pendek'
    //         ]
    //     ]);
    //     $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
    //     // check_already_login();
    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Registrasi Member';
    //         $this->load->view('registrasi', $data);
    //     } else {
    //         $email = $this->input->post('email', true);
    //         $data = [
    //             'nama' => htmlspecialchars($this->input->post('nama', true)),
    //             'email' => htmlspecialchars($this->input->post('email', true)),
    //             'image' => 'default.jpg',
    //             'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //             'role_id' => 2,
    //             'is_active' => 1,
    //             'tanggal_input' => time()
    //         ];
            
    //         $this->db->insert('user',$data);
    //         $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">
    //         Reigsitrasi anda telah berhasil!
    //         </div>');
    //         redirect('auth');
    //     }
    // }
}
