<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mstock extends CI_Model
{

    public function add_in_stock($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function getLastId()
    {
        $this->db->select_max('id_stock');
        $query = $this->db->get('tbl_stock');
        $row = $query->row();
        return $row->id_stock;
    }
    public function get_in()
    {
        $this->db->select('tbl_stock.*,tbl_barang.kode_brg, tbl_barang.nama as nama_brg, tb_supplier.nama_supplier as nama_supplier');
        $this->db->from('tbl_stock');
        $this->db->join('tbl_barang', 'tbl_barang.id_brg=tbl_stock.id_brg');
        $this->db->join('tb_supplier', 'tb_supplier.id_supplier=tbl_stock.id_supplier', 'left');
        $this->db->where('type', 'in');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_out()
    {
        $this->db->select('tbl_stock.*,tbl_barang.kode_brg, tbl_barang.nama as nama_brg, tb_supplier.nama_supplier as nama_supplier');
        $this->db->from('tbl_stock');
        $this->db->join('tbl_barang', 'tbl_barang.id_brg=tbl_stock.id_brg');
        $this->db->join('tb_supplier', 'tb_supplier.id_supplier=tbl_stock.id_supplier', 'left');
        $this->db->where('type', 'out');
        $query = $this->db->get();
        return $query->result();
    }
    public function get($id = null)
    {
        $this->db->select();
        $this->db->from('tbl_stock');
        if ($id != null) {
            $this->db->where('id_stock', $id);
        }
        $query = $this->db->get();
        return $query->row();
    }

    public function delete($id)
    {
        $this->db->where('id_stock', $id);
        $this->db->delete('tbl_stock');
    }
}
