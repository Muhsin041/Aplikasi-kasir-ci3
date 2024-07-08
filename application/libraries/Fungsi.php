<?php
class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }
    public function admin_login()
    {
        $this->ci->load->model('mlogin');
        $admin_id = $this->ci->session->userdata('id_admin');
        $admin_data = $this->ci->mlogin->get($admin_id)->row();
        return $admin_data;
    }


    function PDFgenerate($html, $filename, $paper, $orientation)
    {

        // instantiate and use the dompdf class
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($filename, array('Attachment' => 0));
    }

    public function count_produk($table)
    {
        return $this->ci->db->get($table)->num_rows();
    }
    public function count_supplier($table)
    {
        return $this->ci->db->get($table)->num_rows();
    }
    public function count_customer($table)
    {
        return $this->ci->db->get($table)->num_rows();
    }
    public function count_user($table)
    {
        return $this->ci->db->get($table)->num_rows();
    }
}
