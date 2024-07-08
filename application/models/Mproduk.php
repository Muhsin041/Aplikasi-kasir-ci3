<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mproduk extends CI_Model
{
    public function tampil()
    {
        $query = $this->db->get('tbl_barang');
        return $query->result();
    }
    // public function hapus_data($id)
    // {
    //     $brg = $this->get_produk_data($id);
    //     if ($brg) {
    //         // Delete the image file(s) associated with the record
    //         if (file_exists(FCPATH . 'upload/produk/' . $brg['gambar'])) {
    //             unlink(FCPATH . 'upload/produk/' . $brg['gambar']);
    //         }
    //         $this->db->where('id_brg', $id);
    //         $this->db->delete('tbl_barang');
    //     }
    // }

    public function count_all()
    {
        return $this->db->count_all('tbl_barang'); // Mengganti 'tbl_barang' dengan nama tabel Anda
    }
    public function add($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function getLastId()
    {
        $this->db->select_max('id_brg');
        $query = $this->db->get('tbl_barang');
        $row = $query->row();
        return $row->id_brg;
    }
    public function get($id = null)
    {
        $this->db->select('tbl_barang.*,  tbl_category.nama_cate as nama_cate, tbl_unit.nama_unit as nama_unit ');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_category', 'tbl_barang.id_category = tbl_category.id_category');
        $this->db->join('tbl_unit', 'tbl_barang.id_unit = tbl_unit.id_unit');
        if ($id != null) {
            $this->db->where('id_brg', $id);
            $query = $this->db->get();
            return $query->row();
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function get_produk_data($id)
    {
        $this->db->where('id_brg', $id);
        return $this->db->get('tbl_barang')->row_array();
    }
    public function update($no, $data, $table)
    {
        $this->db->where('id_brg', $no);
        $this->db->update($table, $data);
    }
    public function update_gambar($no, $data, $table)
    {
        $this->db->where('id_brg', $no);
        $this->db->update($table, $data);
    }
    public function hapus_data($id)
    {
        // Mendapatkan data produk berdasarkan ID
        $brg = $this->get_produk_data($id);

        // Memeriksa apakah data produk ditemukan
        if ($brg) {
            // Path ke gambar produk
            $image_path = FCPATH . 'upload/produk/' . $brg['gambar'];

            // Memeriksa apakah file gambar ada dan menghapusnya
            if (file_exists($image_path) && is_file($image_path)) {
                unlink($image_path);
            }

            // Menghapus data produk dari database
            $this->db->where('id_brg', $id);
            $this->db->delete('tbl_barang');

            // Memeriksa apakah data berhasil dihapus
            return $this->db->affected_rows() > 0;
        } else {
            return false; // Data produk tidak ditemukan
        }
    }
    // public function upadate_stock_in()
    // {
    //     $qty = $data['qty'];
    //     $id = $data['id_brg'];
    //     $sql = "UPDATE tbl_produk SET stok = stok +'$qty' WHERE id_brg = '$id'";
    //     $this->db->query($sql);
    // }
    public function update_stock_in($id_brg, $qty)
    {
        $this->db->set('stok', 'stok + ' . $qty, FALSE);
        $this->db->where('id_brg', $id_brg);
        $this->db->update('tbl_barang');
    }
    public function update_stock_del($id_brg, $qty)
    {
        $this->db->set('stok', 'stok - ' . $qty, FALSE);
        $this->db->where('id_brg', $id_brg);
        $this->db->update('tbl_barang');
    }
}
