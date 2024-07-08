<?php

class Template
{
    var $template_data = array();

    function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }
    function load($template = '', $view = '', $view_data = array(), $return = false)
    {
        $this->CI = &get_instance();
        $this->set('contents', $this->CI->load->view($view, $view_data, true));
        return $this->CI->load->view($template, $this->template_data, $return);
    }
} 

// class Template
// {
//     private $template_data = array();
//     private $CI;  // Property untuk menyimpan instance CodeIgniter

//     public function set($name, $value)
//     {
//         $this->template_data[$name] = $value;
//     }

//     public function load($template, $view, $view_data = array(), $return = false)
//     {
//         $this->CI = &get_instance();

//         // Memuat konten view dan menyimpannya ke dalam template_data
//         $this->set('contents', $this->CI->load->view($view, $view_data, true));

//         // Memuat template dengan data yang sudah diset
//         return $this->CI->load->view($template, $this->template_data, $return);
//     }
// }
