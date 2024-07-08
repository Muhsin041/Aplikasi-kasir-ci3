<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Muser');
        $this->load->helper('url');
        $this->load->library('session');
    }
    public function index()
    {
        check_not_login();
        check_admin();
        $this->load->model('Muser');
        $data['result'] = $this->Muser->tampil();
        $this->template->load('template', 'admin/user/users', $data);
    }

    public function tambah()
    {
        check_not_login();
        $this->template->load('template', 'admin/user/users_add');
    }
    public function add()
    {
        $no = $this->Muser->getLastId() + 1;
        $nama = $this->input->post('name');
        $username = $this->input->post('username');
        $password = sha1($this->input->post('password'));
        $password1 = sha1($this->input->post('password1'));
        $akses = $this->input->post('akses');
        $gambar = $_FILES['gambar']['name'];

        // Check if gambar is empty
        if (empty($gambar)) {
            $gambar = '';
        } else {
            $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Gambar Gagal Upload!
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>');
                redirect('users/index');
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        if ($password !== $password1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Password dan konfirmasi password tidak cocok!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('users');
            return;
        }
        // Data yang akan disimpan ke database
        $data = [
            'id_user' => $no,
            'name' => $nama,
            'username' => $username,
            'password' => $password,
            'gambar' => $gambar,
            'akses' => $akses
        ];

        // Memanggil model untuk menyimpan data ke database
        $this->Muser->add($data, 'tbl_users');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        // Redirect ke halaman users/index
        redirect('users/index');
    }


    public function edit_users($id)
    {
        check_not_login();
        $this->load->model('Muser');
        $data['result'] = $this->Muser->get_user_data($id);
        $this->template->load('template', 'admin/user/edit_user', $data);
    }
    public function edit($id)
    {
        check_not_login();
        $this->load->model('Muser');
        $data['result'] = $this->Muser->get_user_data($id);
        $this->template->load('template', 'admin/user/edit', $data);
    }

    public function delete($id)
    {
        $this->load->model('Muser');
        $this->Muser->hapus_data($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Telah Terhapus!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        echo "<script>
                window.location='" . site_url('users') . "'
                </script>";
    }

    public function update($id)
    {
        $no = $id;
        $name = $this->input->post('name');
        $username = $this->input->post('username');
        $akses = $this->input->post('akses');

        // Data to be saved to the database
        $data = [
            'name' => $name,
            'username' => $username,
            'akses' => $akses
        ];

        // Call the model to update data to the database
        $this->Muser->update($no, $data, 'tbl_users');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Diubah!!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('users/index');
    }
    public function edit_pass($id)
    {
        $no = $id;
        $password = sha1($this->input->post('password'));
        $password1 = sha1($this->input->post('password1'));

        if ($password !== $password1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Password and confirm password do not match!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('users/edit/' . $id);
            return;
        }
        $data = [
            'password' => $password
        ];
        $this->Muser->update_pass($no, $data, 'tbl_users');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Password Berhasil Diubah!!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('users/index');
    }
    public function edit_gambar($id)
    {
        $no = $id;
        $gambar = $_FILES['gambar']['name'];
        $old_gambar = $this->input->post('old_gambar');

        // Check if gambar is empty
        if (!empty($gambar)) {
            $config['upload_path'] = 'upload/user/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            gambar Upload Failed!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
                redirect('users/edit_users/' . $id);
            } else {
                // Delete the previous image file
                if (file_exists('upload/user/' . $old_gambar)) {
                    unlink('upload/user/' . $old_gambar);
                }

                $gambar = $this->upload->data('file_name');
            }
        } else {
            $gambar = $old_gambar;
        }

        $data = array(
            'gambar' => $gambar
        );

        $this->Muser->update_gam($no, $data, 'tbl_users');

        // Redirect to the pelanggan page
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Gambar Berhasil Di Ubah!!!
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>');
        redirect('users');
    }
}
