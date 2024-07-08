<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mcategory');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        check_not_login();
        check_admin();
        $this->load->model('Mcategory');
        $data['result'] = $this->Mcategory->tampil();
        $this->template->load('template', 'admin/category/kategori', $data);
    }

    public function delete($id)
    {
        $this->load->model('Mcategory');
        $this->Mcategory->hapus_data($id);
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
                window.location='" . site_url('category') . "'
                </script>";
    }
    public function proses()
    {
        $no = $this->Mcategory->getLastId() + 1;
        $nama = $this->input->post('nama');

        $data = [
            'id_category' => $no,
            'nama_cate' => $nama
        ];

        $this->Mcategory->add($data, 'tbl_category');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Disimpan!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        // Redirect ke halaman users/index
        redirect('category/index');
    }

    public function add_cate()
    {
        check_not_login();
        check_admin();
        $this->template->load('template', 'admin/category/add_cate');
    }
    public function edit_cate($id)
    {
        check_not_login();
        $this->load->model('Mcategory');
        $data['result'] = $this->Mcategory->get_supp_data($id);
        $this->template->load('template', 'admin/category/edit_cate', $data);
    }
    public function edit_proses($id)
    {
        $no = $id;
        $nama = $this->input->post('nama');

        $data = [
            'nama_cate' => $nama
        ];

        $this->Mcategory->update($no, $data, 'tbl_category');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diubah!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        // Redirect ke halaman users/index
        redirect('category/index');
    }
}
