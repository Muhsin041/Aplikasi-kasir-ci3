<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Munit');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        check_not_login();
        check_admin();
        $this->load->model('Munit');
        $data['result'] = $this->Munit->tampil();
        $this->template->load('template', 'admin/unit/unit', $data);
    }
    public function add()
    {
        check_not_login();
        check_admin();
        $this->template->load('template', 'admin/unit/add_unit');
    }
    public function delete($id)
    {
        $this->load->model('Munit');
        $this->Munit->hapus_data($id);
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
                window.location='" . site_url('unit') . "'
                </script>";
    }
    public function proses()
    {
        $no = $this->Munit->getLastId() + 1;
        $nama = $this->input->post('nama');

        $data = [
            'id_unit' => $no,
            'nama_unit' => $nama
        ];

        $this->Munit->add($data, 'tbl_unit');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Disimpan!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        // Redirect ke halaman users/index
        redirect('unit/index');
    }

    public function add_unit()
    {
        check_not_login();
        check_admin();
        $this->template->load('template', 'admin/unit/add_unit');
    }
    public function edit_unit($id)
    {
        check_not_login();
        $this->load->model('Munit');
        $data['result'] = $this->Munit->get_supp_data($id);
        $this->template->load('template', 'admin/unit/edit_unit', $data);
    }
    public function edit_proses($id)
    {
        $no = $id;
        $nama = $this->input->post('nama');

        $data = [
            'nama_unit' => $nama
        ];

        $this->Munit->update($no, $data, 'tbl_unit');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diubah!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        // Redirect ke halaman users/index
        redirect('unit/index');
    }
}
