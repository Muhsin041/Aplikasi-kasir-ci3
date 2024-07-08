<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlogin extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('username', $this->db->escape_str($post['username']));
        $this->db->where('password', $this->db->escape_str(sha1($post['password'])));
        $query = $this->db->get();
        return $query;
    }
    public function cs_login($post)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('username', $this->db->escape_str($post['username']));
        $this->db->where('password', $this->db->escape_str(sha1($post['password'])));
        $query = $this->db->get();
        return $query;
    }
    // public function login($post)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_users');
    //     $this->db->where('username', $post['username']);
    //     $this->db->where('password', sha1($post['password']));
    //     $query = $this->db->get();
    //     return $query;
    // }

    public function get($id = null)
    {
        $this->db->select();
        $this->db->from('tbl_users');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
