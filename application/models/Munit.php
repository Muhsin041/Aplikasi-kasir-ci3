<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Munit extends CI_Model
{
    public function tampil()
    {
        $query = $this->db->get('tbl_unit');
        return $query->result();
    }
    public function hapus_data($id)
    {
        $this->db->where('id_unit', $id);
        $this->db->delete('tbl_unit');
    }
    public function add($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function getLastId()
    {
        $this->db->select_max('id_unit');
        $query = $this->db->get('tbl_unit');
        $row = $query->row();
        return $row->id_unit;
    }
    public function get($id = null)
    {
        $this->db->select();
        $this->db->from('tbl_unit');
        if ($id != null) {
            $this->db->where('id_unit', $id);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function get_supp_data($id)
    {
        $this->db->where('id_unit', $id);
        return $this->db->get('tbl_unit')->row_array();
    }
    public function update($no, $data, $table)
    {
        $this->db->where('id_unit', $no);
        $this->db->update($table, $data);
    }
}
