<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Mproduk', 'Msupplier', 'Mstock']);
        // $this->load->model('Mstock');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function stock_masuk()
    {
        $data['result'] = $this->Mstock->get_in();
        $this->template->load('template', 'admin/stock/stock_in/stock_in_data', $data);
    }
    public function stock_add()
    {
        $data['produk'] = $this->Mproduk->get();
        $data['supplier'] = $this->Msupplier->get()->result();
        $this->template->load('template', 'admin/stock/stock_in/stock_in_add', $data);
    }
    public function stock_keluar()
    {
        $data['result'] = $this->Mstock->get_out();
        $this->template->load('template', 'admin/stock/stock_out/stock_out_data', $data);
    }
    public function stock_out()
    {
        $data['produk'] = $this->Mproduk->get();
        $data['supplier'] = $this->Msupplier->get()->result();
        $this->template->load('template', 'admin/stock/stock_out/stock_out_add', $data);
    }

    public function proses_in()
    {
        $no = $this->Mstock->getLastId() + 1;
        $id_brg = $this->input->post('id_brg');
        $detail = $this->input->post('detail');
        $date = $this->input->post('date');
        $supplier = $this->input->post('supplier');
        $qty = $this->input->post('qty');

        $data = [
            'id_stock' => $no,
            'id_brg' => $id_brg,
            'type' => 'in',
            'detail' => $detail,
            'id_supplier' => $supplier == '' ? NULL : $supplier,
            'qty' => $qty,
            'date' => $date,
            'id_user' => $this->session->userdata('id_user')

        ];

        $this->Mstock->add_in_stock($data, 'tbl_stock');
        $this->Mproduk->update_stock_in($id_brg, $qty);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Disimpan!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        // Redirect ke halaman users/index
        redirect('stock/in');
    }
    public function proses_out()
    {
        $no = $this->Mstock->getLastId() + 1;
        $id_brg = $this->input->post('id_brg');
        $detail = $this->input->post('detail');
        $date = $this->input->post('date');
        $supplier = $this->input->post('supplier');
        $qty = $this->input->post('qty');

        $data = [
            'id_stock' => $no,
            'id_brg' => $id_brg,
            'type' => 'out',
            'detail' => $detail,
            'id_supplier' => $supplier == '' ? NULL : $supplier,
            'qty' => $qty,
            'date' => $date,
            'id_user' => $this->session->userdata('id_user')

        ];
        $this->Mstock->add_in_stock($data, 'tbl_stock');
        $this->Mproduk->update_stock_del($id_brg, $qty);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Disimpan!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        // Redirect ke halaman users/index
        redirect('stock/out');
    }
    public function delete()
    {
        $id_stock = $this->input->post('id_stock');
        $id_brg = $this->input->post('id_brg');
        $stock = $this->Mstock->get($id_stock);
        $qty = $stock->qty;
        $this->Mproduk->update_stock_del($id_brg, $qty);
        $this->Mstock->delete($id_stock);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Telah Terhapus!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        echo "<script>
                window.location='" . site_url('stock/in') . "'
                </script>";
    }
    public function delete_out()
    {
        $id_stock = $this->input->post('id_stock');
        $id_brg = $this->input->post('id_brg');
        $stock = $this->Mstock->get($id_stock);
        $qty = $stock->qty;
        $this->Mproduk->update_stock_in($id_brg, $qty);
        $this->Mstock->delete($id_stock);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Telah Terhapus!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        echo "<script>
                window.location='" . site_url('stock/out') . "'
                </script>";
    }
    // public function delete_out($id)
    // {
    //     $this->Mstock->delete($id);
    //     $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //         Data Telah Terhapus!!!!
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //             <span aria-hidden="true">&times;</span>
    //         </button>
    //     </div>');
    //     echo "<script>
    //             window.location='" . site_url('stock/out') . "'
    //             </script>";
    // }
}
