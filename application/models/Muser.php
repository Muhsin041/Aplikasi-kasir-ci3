<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Muser extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select();
        $this->db->from('tbl_users');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function tampil()
    {
        $query = $this->db->get('tbl_users');
        return $query->result();
    }
    public function add($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function getLastId()
    {
        $this->db->select_max('id_user');
        $query = $this->db->get('tbl_users');
        $row = $query->row();
        return $row->id_user;
    }
    public function hapus_data($id)
    {
        $plg = $this->get_user_data($id);
        if ($plg) {
            // Delete the image file(s) associated with the record
            if (file_exists(FCPATH . 'upload/' . $plg['gambar'])) {
                unlink(FCPATH . 'upload/' . $plg['gambar']);
            }

            // Delete the record from the database
            $this->db->where('id_user', $id);
            $this->db->delete('tbl_users');
        }
    }
    public function update($no, $data, $table)
    {
        $this->db->where('id_user', $no);
        $this->db->update($table, $data);
    }
    public function update_pass($no, $data, $table)
    {
        $this->db->where('id_user', $no);
        $this->db->update($table, $data);
    }
    public function update_gam($no, $data, $table)
    {
        $this->db->where('id_user', $no);
        $this->db->update($table, $data);
    }
    public function get_user_data($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('tbl_users')->row_array();
    }
    public function count_all()
    {
        return $this->db->count_all('tbl_users'); // Mengganti 'tbl_barang' dengan nama tabel Anda
    }
}
