<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Mlogin', 'Mplg']);
    }

    function index()
    {
        check_already_login();
        $this->load->view('auth/login');
    }
    function customer()
    {
        $this->load->view('auth/cs_login');
    }
    function customer_register()
    {
        $this->load->view('auth/register');
    }

    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($post['login'])) {
            $query = $this->Mlogin->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'id_user' => $row->id_user,
                    'akses' => $row->akses
                );
                $this->session->set_userdata($params);
                echo "<script>
                alert('Selamat. Login Berhasil')
                window.location='" . site_url('dashboard') . "'
                </script>";
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                       Username Dan Password Salah..!!!!
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>');
                redirect('auth');
            }
        }
    }
    public function process_cs()
    {
        // Get the posted data and sanitize it
        $post = $this->input->post(null, true);

        // Check if the login form was submitted
        if (isset($post['login'])) {
            // Attempt to authenticate the user with the posted data
            $query = $this->Mlogin->cs_login($post);

            // If authentication is successful
            if ($query->num_rows() > 0) {
                // Retrieve the first row of the query result
                $row = $query->row();

                // Set the session data with the user ID
                $params = array(
                    'id_customer' => $row->id_customer,
                );
                $this->session->set_userdata($params);
                // var_dump();
                // Redirect to the customer dashboard with a success message
                echo "<script>
                alert('Selamat. Login Berhasil');
                window.location='" . site_url('onlineshop') . "';
                </script>";
            } else {
                // Set a flash message for incorrect username or password
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                       Username dan Password salah!
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>');

                // Redirect back to the customer login page
                redirect('auth/customer');
            }
        }
    }

    public function proses_registrasi()
    {
        $no = $this->Mplg->getLastId() + 1;
        $kode_plg = $this->input->post('kode_plg');
        $nama = $this->input->post('nama');
        $no_hp = $this->input->post('no_hp');
        $gender = $this->input->post('gender');
        $username = $this->input->post('username');
        $password = sha1($this->input->post('password'));
        $password1 = sha1($this->input->post('password1'));
        $alamat = $this->input->post('alamat');

        if ($password !== $password1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Password dan konfirmasi password tidak cocok!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('auth/customer_register');
            return;
        }
        // Data yang akan disimpan ke database
        $data = [
            'id_customer' => $no,
            'kode_plg' => $kode_plg,
            'nama' => $nama,
            'no_hp' => $no_hp,
            'jenis_kelamin' => $gender,
            'username' => $username,
            'password' => $password,
            'alamat' => $alamat,
            'gambar' => 'default.jpg'
        ];

        // Memanggil model untuk menyimpan data ke database
        $this->Mplg->add($data, 'tbl_customer');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        // Redirect ke halaman users/index
        redirect('auth/customer_register');
    }
    function cs_logout()
    {
        $params = array('id_customer');
        $this->session->unset_userdata($params);
        redirect('auth/customer');
    }

    function logout()
    {
        $params = array('id_user', 'akses');
        $this->session->unset_userdata($params);
        redirect('auth');
    }
}
