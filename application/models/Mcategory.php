<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mcategory extends CI_Model
{
    public function tampil()
    {
        $query = $this->db->get('tbl_category');
        return $query->result();
    }
    public function hapus_data($id)
    {
        $this->db->where('id_category', $id);
        $this->db->delete('tbl_category');
    }
    public function add($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function getLastId()
    {
        $this->db->select_max('id_category');
        $query = $this->db->get('tbl_category');
        $row = $query->row();
        return $row->id_category;
    }
    public function get_supp_data($id)
    {
        $this->db->where('id_category', $id);
        return $this->db->get('tbl_category')->row_array();
    }
    public function get($id = null)
    {
        $this->db->select();
        $this->db->from('tbl_category');
        if ($id != null) {
            $this->db->where('id_category', $id);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function update($no, $data, $table)
    {
        $this->db->where('id_category', $no);
        $this->db->update($table, $data);
    }
}
