<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['barang'] = $this->admin->getAllBarang(); // Fetch all 'barang' items
        $data['user'] = $this->admin->count('user');
        $data['totalDataBelumDiterima'] = $this->admin->hitungDataBelumDiproses();
        $this->template->load('templates/dashboard', 'dashboard', $data);
    }
}
