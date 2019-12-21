<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $judul['title'] = 'HALAMAN SKRIPSI';
        $nama['nama_user'] = 'Pendaftar Skripsi';
        $this->load->view('Main/main-view-before', $judul + $nama);
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
            $judul['title'] = 'HALAMAN DOSEN';
            $nama['nama_user'] = 'Dosen Admin';
            $this->load->view('dosen/v_dosen', $judul + $nama);
        }
    }
}
