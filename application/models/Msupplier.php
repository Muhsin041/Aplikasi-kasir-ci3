<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Msupplier extends CI_Model
{
    public function tampil()
    {
        $query = $this->db->get('tb_supplier');
        return $query->result();
    }
    public function hapus_data($id)
    {
        $this->db->where('id_supplier', $id);
        $this->db->delete('tb_supplier');
    }
    public function add($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function getLastId()
    {
        $this->db->select_max('id_supplier');
        $query = $this->db->get('tb_supplier');
        $row = $query->row();
        return $row->id_supplier;
    }
    public function update($no, $data, $table)
    {
        $this->db->where('id_supplier', $no);
        $this->db->update($table, $data);
    }
    public function get_supp_data($id)
    {
        $this->db->where('id_supplier', $id);
        return $this->db->get('tb_supplier')->row_array();
    }
    public function get($id = null)
    {
        $this->db->select();
        $this->db->from('tb_supplier');
        if ($id != null) {
            $this->db->where('id_supplier', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function count_all()
    {
        return $this->db->count_all('tb_supplier'); // Mengganti 'tbl_barang' dengan nama tabel Anda
    }
}
