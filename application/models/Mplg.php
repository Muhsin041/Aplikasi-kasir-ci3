<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mplg extends CI_Model
{
    public function add($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function getLastId()
    {
        $this->db->select_max('id_customer');
        $query = $this->db->get('tbl_customer');
        $row = $query->row();
        return $row->id_customer;
    }
    public function tampil()
    {
        $query = $this->db->get('tbl_customer');
        return $query->result();
    }
    public function get_plg_data($id)
    {
        $this->db->where('id_customer', $id);
        return $this->db->get('tbl_customer')->row_array();
    }
    // mengedit pelanggan
    public function update($no, $data, $table)
    {
        $this->db->where('id_customer', $no);
        $this->db->update($table, $data);
    }
    // mengedit password
    public function update_pass($no, $data, $table)
    {
        $this->db->where('id_customer', $no);
        $this->db->update($table, $data);
    }
    public function update_gambar($no, $data, $table)
    {
        $this->db->where('id_customer', $no);
        $this->db->update($table, $data);
    }
    // menghapus pelanggan
    public function hapus_data($id)
    {
        $plg = $this->get_plg_data($id);
        if ($plg) {
            // Delete the image file(s) associated with the record
            if (file_exists(FCPATH . 'upload/plg/' . $plg['gambar'])) {
                unlink(FCPATH . 'upload/plg/' . $plg['gambar']);
            }

            // Delete the record from the database
            $this->db->where('id_customer', $id);
            $this->db->delete('tbl_customer');
        }
    }
    public function get($id = null)
    {
        $this->db->select();
        $this->db->from('tbl_customer');
        if ($id != null) {
            $this->db->where('id_customer', $id);
        }
        $query = $this->db->get();
        return $id != null ? $query->row() : $query->result();;
    }
}
