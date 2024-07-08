<?php
class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }
    public function user_login()
    {
        $this->ci->load->model('mlogin');
        $admin_id = $this->ci->session->userdata('id_user');
        $admin_data = $this->ci->mlogin->get($admin_id)->row();
        return $admin_data;
    }
    public function cs_login()
    {
        $this->ci->load->model('Mplg');
        $cs_id = $this->ci->session->userdata('id_customer');
        $cs_data = $this->ci->Mplg->get($cs_id);
        return !empty($cs_data) ? $cs_data[0] : null;
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
