<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Mproduk', 'Mcategory', 'Munit']);
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        check_not_login();
        check_admin();
        $this->load->model('Mproduk');
        $data['result'] = $this->Mproduk->get();
        $this->template->load('template', 'admin/produk/item', $data);
    }

    public function delete($id)
    {
        $this->load->model('Mproduk');

        if ($this->Mproduk->hapus_data($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Telah Terhapus!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Tidak Ditemukan atau Gagal Dihapus!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        }

        echo "<script>
            window.location='" . site_url('produk') . "'
          </script>";
    }


    // public function delete($id)
    // {
    //     $this->load->model('Mproduk');
    //     $this->Mproduk->hapus_data($id);
    //     $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //         Data Telah Terhapus!!!!
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //             <span aria-hidden="true">&times;</span>
    //         </button>
    //     </div>');
    //     echo "<script>
    //             window.location='" . site_url('produk') . "'
    //             </script>";
    // }
    public function add_item()
    {
        check_not_login();
        check_admin();
        $data['kategori'] = $this->Mcategory->get();
        $data['unit'] = $this->Munit->get();
        $this->template->load('template', 'admin/produk/add_item', $data);
    }
    public function proses()
    {
        $no = $this->Mproduk->getLastId() + 1;
        $kode_brg = $this->input->post('kode_brg');
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $unit = $this->input->post('unit');
        $harga = $this->input->post('harga');
        $gambar = $_FILES['gambar']['name'];

        if (empty($gambar)) {
            $gambar = '';
        } else {
            $config['upload_path'] = 'upload/produk/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Gambar Gagal Upload!
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>');
                redirect('produk/add_item');
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = [
            'id_brg' => $no,
            'kode_brg' => $kode_brg,
            'nama' => $nama,
            'id_category' => $kategori,
            'id_unit' => $unit,
            'harga' => $harga,
            'gambar' => $gambar,

        ];

        $this->Mproduk->add($data, 'tbl_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Disimpan!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        // Redirect ke halaman users/index
        redirect('produk/index');
    }


    public function edit_item($id)
    {
        check_not_login();
        $this->load->model('Mproduk');
        $this->load->model('Mcategory');
        $this->load->model('Munit');
        $data['kategori'] = $this->Mcategory->get();
        $data['unit'] = $this->Munit->get();
        $data['result'] = $this->Mproduk->get($id);
        $this->template->load('template', 'admin/produk/edit_item', $data);
    }
    public function edit_proses($id)
    {
        $no = $id;
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $unit = $this->input->post('unit');
        $harga = $this->input->post('harga');
        $data = [
            'nama' => $nama,
            'id_category' => $kategori,
            'id_unit' => $unit,
            'harga' => $harga,
        ];

        $this->Mproduk->update($no, $data, 'tbl_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diubah!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        // Redirect ke halaman users/index
        redirect('produk/index');
    }

    public function edit_gambar($id)
    {
        $no = $id;
        $gambar = $_FILES['gambar']['name'];
        $old_gambar = $this->input->post('old_gambar');

        // Check if gambar is empty
        if (!empty($gambar)) {
            $config['upload_path'] = 'upload/produk/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            gambar Upload Failed!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
                redirect('produk/edit_item/' . $id);
            } else {
                // Delete the previous image file
                if (file_exists('upload/produk/' . $old_gambar)) {
                    unlink('upload/produk/' . $old_gambar);
                }

                $gambar = $this->upload->data('file_name');
            }
        } else {
            $gambar = $old_gambar;
        }

        $data = array(
            'gambar' => $gambar
        );

        $this->Mproduk->update_gambar($no, $data, 'tbl_barang');

        // Redirect to the produk page
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Gambar Berhasil Di Ubah!!!
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>');
        redirect('produk');
    }

    function barcode($id)
    {
        $this->load->model('Mproduk');
        $data['result'] = $this->Mproduk->get($id);
        $this->template->load('template', 'admin/produk/barcode', $data);
    }
    function barcode_pdf($id)
    {
        $this->load->model('Mproduk');
        $data['result'] = $this->Mproduk->get($id);
        $html = $this->load->view('admin/produk/barcode_print', $data, true);
        $this->fungsi->PDFgenerate($html, 'barcode-' . $data['result']->kode_brg, 'A4', 'landscape');
    }
}
