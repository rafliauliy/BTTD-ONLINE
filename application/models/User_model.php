<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_all_users()
    {
        $this->db->select('id_user, username, nama_perusahaan'); // Memilih kolom id_user, username, dan nama_perusahaan
        $query = $this->db->get('user'); // Mendapatkan data dari tabel 'user'
        return $query->result_array(); // Mengembalikan hasil dalam bentuk array
    }
}
?>
