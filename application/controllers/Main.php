<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Template');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
    public function index()
    {
        // $judul['title'] = 'HALAMAN SKRIPSI';
        // $nama['nama_user'] = 'Pendaftar Skripsi';
        // $this->load->view('Main/TMP', $judul + $nama);

        $data['title'] = 'HALAMAN SKRIPSI';
        $nama['nama_user'] = 'Pendaftar Skripsi';
        // $this->template->display('main/beranda', $data + $nama);
        $this->template->display('main/beranda', $data + $nama);
    }
    public function dosen()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email Harus di Isi',
            'valid_email' => 'Email Anda tidak Valid'
        ]);
        $this->form_validation->set_rules('pass', 'Pass', 'required|trim', [
            'required' => 'Password Harus di Isi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Dosen';
            $this->load->view('dosen/v_login', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('pass');

            $user = $this->db->get_where('dosen', ['email_dosen' => $email])->row_array();
            $pass = $this->db->get_where('dosen', ['password_dosen' => $password])->row_array();

            if ($user . $pass) {
                $this->session->set_userdata($data);
                redirect('index.php/dosen');
            } else {
                //$this->session->set_flashdata('eror', 'PASSWORD SALAH');
                $this->session->set_flashdata('message', '<div class="alert 
                alert-warning" role="alert"> PASSWORD SALAH </div>');
                redirect('index.php/main/dosen');
            }


            $judul['title'] = 'HALAMAN DOSEN';
            $nama['nama_user'] = 'Dosen Admin';
            $this->load->view('dosen/v_dosen', $judul + $nama);
        }
    }
    public function fitur_1()
    {
        $data['title'] = 'HALAMAN SKRIPSI';
        $nama['nama_user'] = 'Pendaftar Skripsi';
        $this->template->display('mahasiswa/fitur_1', $data + $nama);
    }
    public function fitur_2()
    {
        $data['title'] = 'HALAMAN SKRIPSI';
        $nama['nama_user'] = 'Pendaftar Skripsi';
        $this->template->display('mahasiswa/fitur_2', $data + $nama);
    }
}
