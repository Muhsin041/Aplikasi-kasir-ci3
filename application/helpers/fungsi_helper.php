<?php

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_user');
    if ($user_session) {
        redirect('dashboard');
    }
}
function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_user');
    if (!$user_session) {
        redirect('login');
    }
}
function check_admin()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->admin_login()->akses != 1) {
        redirect('dashboard');
    }
}
function Kode_plg()
{
    $ci = get_instance();
    $query = "SELECT MAX(kode_plg) as maxKode FROM tbl_customer";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $noUrut = (int)substr($kode, 4, 5);
    $noUrut++;
    $char = "PLG";
    $kodeBaru = $char . sprintf("%05s", $noUrut);
    return $kodeBaru;
}
function indo_currency($nominal)
{
    $result = "Rp " . number_format($nominal, 2, ',', '.');
    return $result;
}
function Kode_brg()
{
    $ci = get_instance();
    $query = "SELECT MAX(kode_brg) as maxKode FROM tbl_barang";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $noUrut = (int)substr($kode, 4, 5);
    $noUrut++;
    $char = "BRG";
    $kodeBaru = $char . sprintf("%05s", $noUrut);
    return $kodeBaru;
}
function indo_date($date)
{
    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);
    return $d . '/' . $m . '/' . $y;
}
