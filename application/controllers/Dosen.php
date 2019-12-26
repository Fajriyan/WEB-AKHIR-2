<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function index()
    {
        $data['dosen'] = $this->db->get_where('dosen', ['email_dosen' =>
        $this->session->userdata('email')])->row_array();
        //echo "SELAMAT DATANG " . $data['user']['nama'];


        // $atas['title'] = 'Dashboard';
        // $judul['nama_judul'] = $data['user']['nama'];
        $judul['title'] = 'HALAMAN DOSEN';
        $nama['nama_user'] = $data['dosen']['nama_dosen'];
        $this->load->view('dosen/v_dosen', $judul + $nama);
    }
}
