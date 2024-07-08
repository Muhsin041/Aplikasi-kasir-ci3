<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Onlineshop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('customer/dashboard');
    }
}
