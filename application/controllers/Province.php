<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Province
 *
 * @author durioindigo
 */
class Province extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $useracces = $this->session->userdata('useracces');
        if (!empty($useracces)) {
            // load URL helper
            $this->load->helper('url');
            $this->load->model('ModelProvince');
            $this->load->library('pagination');
        } else {
            redirect(base_url());
        }
    }

    public function index() {
//        $useracces = $this->session->userdata('useracces');
//         if (!empty($useracces)) {
        $data['path'] = base_url() . 'assets';

        $config = array();
        $config['base_url'] = base_url() . 'Province/page';
        $config['total_rows'] = $this->ModelProvince->record_count();
        $config['per_page'] = 5;
        $config["uri_segment"] = 3;
        
        // Membuat Style pagination untuk BootStrap v4
      $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-right"><nav><ul class="pagination justify-content-right">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $dataTable["results"] = $this->ModelProvince->fetch_province($config["per_page"], $page);
        $dataTable['links'] = $this->pagination->create_links();
        $this->load->view('header', $data);
        $this->load->view('province', $dataTable);
        $this->load->view('footer', $data);

//         }else{
//             redirect(base_url());
//         }
    }

    function page() {
        $data['path'] = base_url() . 'assets';
        $config = array();
        $config['base_url'] = base_url() . 'Province/page';
        $config['total_rows'] = $this->ModelProvince->record_count();
        $config['per_page'] = 5;
        $config["uri_segment"] = 3;
       
        // Membuat Style pagination untuk BootStrap v4
      $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-right"><nav><ul class="pagination justify-content-right">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $dataTable["results"] = $this->ModelProvince->fetch_province($config["per_page"], $page);
        $dataTable['links'] = $this->pagination->create_links();
        
        $this->load->view('header', $data);
        $this->load->view('province', $dataTable);
        $this->load->view('footer', $data);
    }

    function act() {
//        $this->load->model('ModelProvince');
        $id_province = $_POST['id_province'];
        $province_name = $_POST['province_name'];
        if ($id_province == 0) {
            $this->ModelProvince->InsertProvince($province_name);
        } else {
            $this->ModelProvince->updateProvince($id_province, $province_name);
        }
        redirect(base_url() . 'Province');
    }
    function deleteProvince(){
        $id_province = $_POST['id'];
         $this->ModelProvince->deleteProvince($id_province);
        echo 'Data Delete';
    }

}
