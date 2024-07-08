<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Msupplier');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        check_not_login();
        check_admin();
        $this->load->model('Msupplier');
        $data['result'] = $this->Msupplier->tampil();
        $this->template->load('template', 'admin/supplier/supplier', $data);
    }
    public function add()
    {
        check_not_login();
        check_admin();
        $this->template->load('template', 'admin/supplier/add_supp');
    }
    public function delete($id)
    {
        $this->load->model('Msupplier');
        $this->Msupplier->hapus_data($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Tidak Dapat Terhapus (Sudah Berelasi)!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Telah Terhapus!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        }
        echo "<script>
                window.location='" . site_url('supplier') . "'
                </script>";
    }
    public function proses()
    {
        $no = $this->Msupplier->getLastId() + 1;
        $nama = $this->input->post('nama');
        $nohp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'id_supplier' => $no,
            'nama_supplier' => $nama,
            'no_hp' => $nohp,
            'alamat' => $alamat,
            'keterangan' => $keterangan
        ];

        $this->Msupplier->add($data, 'tb_supplier');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Disimpan!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        // Redirect ke halaman users/index
        redirect('supplier/index');
    }

    public function edit_supp($id)
    {
        check_not_login();
        $this->load->model('Msupplier');
        $data['result'] = $this->Msupplier->get_supp_data($id);
        $this->template->load('template', 'admin/supplier/edit_supp', $data);
    }
    public function edit($id)
    {
        $no = $id;
        $nama = $this->input->post('nama');
        $nohp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'nama_supplier' => $nama,
            'no_hp' => $nohp,
            'alamat' => $alamat,
            'keterangan' => $keterangan
        ];

        $this->Msupplier->update($no, $data, 'tb_supplier');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Di Ubah!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        // Redirect ke halaman users/index
        redirect('supplier/index');
    }
}
