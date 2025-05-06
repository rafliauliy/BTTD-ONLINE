<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getMax($table, $field)
    {
        $this->db->select_max($field);
        $query = $this->db->get($table);
        return $query->row()->$field;
    }

    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function insert_batch($table, $data)
    {
        return $this->db->insert_batch($table, $data);
    }

    public function get_all($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function get($table, $where)
    {
        return $this->db->get_where($table, $where)->row_array();
    }

    public function update($table, $field, $id, $data)
    {
        $this->db->where($field, $id);
        return $this->db->update($table, $data);
    }
    


    public function delete($table, $field, $id)
    {
        $this->db->where($field, $id);
        return $this->db->delete($table);
    }

    public function getAllPerusahaan()
    {
        return $this->db->get('perusahaan')->result_array();
    }

    public function getPerusahaanByUserId($userId)
    {
        return $this->db->get_where('perusahaan', ['id_user' => $userId])->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('perusahaan', array('id' => $id))->row_array();
    }
}
