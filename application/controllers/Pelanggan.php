<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mplg');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        check_not_login();
        check_admin();
        $this->load->model('Mplg');
        $data['result'] = $this->Mplg->tampil();
        $this->template->load('template', 'admin/pelanggan/pelanggan', $data);
    }

    //pindah page tambah pelanggan
    public function add()
    {
        check_not_login();
        check_admin();
        $this->template->load('template', 'admin/pelanggan/add_plg');
    }
    //menambah pelanggan
    public function proses_plg()
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
        $gambar = $_FILES['gambar']['name'];

        // Check if gambar is empty
        if (empty($gambar)) {
            $gambar = '';
        } else {
            $config['upload_path'] = 'upload/plg/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Gambar Gagal Upload!
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>');
                redirect('pelanggan/index');
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
            redirect('pelanggan/index');
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
            'gambar' => $gambar
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
        redirect('pelanggan/index');
    }
    //pindah page edit pelanggan
    public function edit($id)
    {
        check_not_login();
        check_admin();
        $this->load->model('Mplg');
        $data['result'] = $this->Mplg->get_plg_data($id);
        $this->template->load('template', 'admin/pelanggan/edit_pelanggan', $data);
    }
    // public function edit_plg()
    // {
    //     check_not_login();
    //     check_admin();
    //     $this->template->load('template', 'adplg/edit_pelanggan');
    // }
    // public function plg($id)
    // {
    //     check_not_login();
    //     check_admin();
    //     $this->load->model('Mplg');
    //     $data['result'] = $this->Mplg->get_plg_data($id);
    //     $this->template->load('template', 'adplg/plg', $data);
    // }

    // mengubah pelanggan
    // public function proses_edit($id)
    // {
    //     $no = $id;
    //     $name = $this->input->post('nama');
    //     $no_hp = $this->input->post('no_hp');
    //     $gender = $this->input->post('gender');
    //     $username = $this->input->post('username');
    //     $password = sha1($this->input->post('password'));
    //     $password1 = sha1($this->input->post('password1'));
    //     $alamat = $this->input->post('alamat');
    //     $gambar = $_FILES['gambar']['name'];
    //     $old_gambar = $this->input->post('old_gambar');

    //     // Check if gambar is empty
    //     if (empty($gambar)) {
    //         $gambar = $old_gambar;
    //     } else {
    //         $config['upload_path'] = 'upload/plg/';
    //         $config['allowed_types'] = 'jpeg|gif|jpg|png';
    //         $this->load->library('upload', $config);

    //         if (!$this->upload->do_upload('gambar')) {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //             gambar Upload Failed!
    //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                 <span aria-hidden="true">&times;</span>
    //             </button>
    //         </div>');
    //             redirect('pelanggan/editplg/' . $id);
    //         } else {
    //             // Delete the previous image file
    //             if (file_exists('upload/plg/' . $old_gambar)) {
    //                 unlink('upload/plg/' . $old_gambar);
    //             }

    //             $gambar = $this->upload->data('file_name');
    //         }
    //     }

    //     if ($password !== $password1) {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //         Password and confirm password do not match!
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //             <span aria-hidden="true">&times;</span>
    //         </button>
    //     </div>');
    //         redirect('pelanggan/editplg/' . $id);
    //         return;
    //     }

    //     // Update the record in the database
    //     $data = array(
    //         'nama' => $name,
    //         'no_hp' => $no_hp,
    //         'jenis_kelamin' => $gender,
    //         'username' => $username,
    //         'password' => $password,
    //         'alamat' => $alamat,
    //         'gambar' => $gambar
    //     );

    //     $this->Mplg->update($no, $data, 'tbl_customer');

    //     $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //     Data Berhasil Di Ubah!!!
    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         <span aria-hidden="true">&times;</span>
    //     </button>
    // </div>');
    //     redirect('pelanggan');
    // }

    public function proses_edit($id)
    {
        $no = $id;
        $name = $this->input->post('nama');
        $no_hp = $this->input->post('no_hp');
        $gender = $this->input->post('gender');
        $username = $this->input->post('username');
        $alamat = $this->input->post('alamat');


        // Update the record in the database
        $data = array(
            'nama' => $name,
            'no_hp' => $no_hp,
            'jenis_kelamin' => $gender,
            'username' => $username,
            'alamat' => $alamat,

        );

        $this->Mplg->update($no, $data, 'tbl_customer');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Data Berhasil Di Ubah!!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>');
        redirect('pelanggan');
    }
    // mengedit password
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
            redirect('pelanggan/plg/' . $id);
            return;
        }

        // Update the record in the database
        $data = array(
            'password' => sha1($password)
        );
        $this->Mplg->update_pass($no, $data, 'tbl_customer');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Password Berhasil Di Ubah!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('pelanggan');
    }
    public function edit_gambar($id)
    {
        $no = $id;
        $gambar = $_FILES['gambar']['name'];
        $old_gambar = $this->input->post('old_gambar');

        // Check if gambar is empty
        if (!empty($gambar)) {
            $config['upload_path'] = 'upload/plg/';
            $config['allowed_types'] = 'jpeg|gif|jpg|png';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            gambar Upload Failed!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
                redirect('pelanggan/plg/' . $id);
            } else {
                // Delete the previous image file
                if (file_exists('upload/plg/' . $old_gambar)) {
                    unlink('upload/plg/' . $old_gambar);
                }

                $gambar = $this->upload->data('file_name');
            }
        } else {
            $gambar = $old_gambar;
        }

        $data = array(
            'gambar' => $gambar
        );

        $this->Mplg->update_gambar($no, $data, 'tbl_customer');

        // Redirect to the pelanggan page
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Gambar Berhasil Di Ubah!!!
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>');
        redirect('pelanggan');
    }

    //menghapus pelanggan
    public function delete($id)
    {
        $this->load->model('Mplg');
        $this->Mplg->hapus_data($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Telah Terhapus!!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        echo "<script>
                window.location='" . site_url('pelanggan') . "'
                </script>";
    }
}
