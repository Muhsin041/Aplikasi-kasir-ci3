<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Mplg', 'Mproduk', 'Msale']);
        $this->load->helper('url');
        $this->load->library('session');
    }
    public function index()
    {
        check_not_login();
        $data['customer'] = $this->Mplg->get();
        $data['produk'] = $this->Mproduk->get();
        $data['invoice'] = $this->Msale->invoice_no();
        $this->template->load('template', 'admin/transaksi/sales/transaksi', $data);
    }
}
