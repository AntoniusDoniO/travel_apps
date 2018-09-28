<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Voucher
 *
 * @author durioindigo
 */
class Voucher extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $useracces = $this->session->userdata('useracces');
        if (!empty($useracces)) {
            // load URL helper
            $this->load->helper('url');
            $this->load->model('ModelSource_voucher');
            $this->load->model('ModelRoom_type');
            $this->load->model('ModelHotel');
            $this->load->model('ModelVoucher');
            $this->load->library('pagination');
        } else {
            redirect(base_url());
        }
    }
    public function  index(){
    $data['path'] = base_url() . 'assets';

        $config = array();
        $config['base_url'] = base_url() . 'Voucher/page';
        $config['total_rows'] = $this->ModelVoucher->record_count();
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
        $dataTable["results"] = $this->ModelVoucher->fetch_voucer_travel($config["per_page"], $page);
        $dataTable['links'] = $this->pagination->create_links();
        $this->load->view('header', $data);
        $this->load->view('voucher', $dataTable);
        $this->load->view('footer', $data);

//         }else{
//             redirect(base_url());
//         }
    }

    function page() {
        $data['path'] = base_url() . 'assets';
        $config = array();
        $config['base_url'] = base_url() . 'Voucher/page';
        $config['total_rows'] = $this->ModelVoucher->record_count();
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
        $dataTable["results"] = $this->ModelVoucher->fetch_voucer_travel($config["per_page"], $page);
        $dataTable['links'] = $this->pagination->create_links();
        
        $this->load->view('header', $data);
        $this->load->view('voucher', $dataTable);
        $this->load->view('footer', $data);
    }
    function act() {
//        $this->load->model('ModelSubdistricr');
        $id_voucer = $_POST['id_voucer'];
        $no_voucer = $_POST['no_voucer'];
        $id_source = $_POST['id_source'];
        $id_room_type=$_POST['id_room_type'];
        $id_hotel=$_POST['id_hotel'];
        $price=$_POST['price'];
        $start_date=$_POST['start_date'];
        $end_date=$_POST['end_date'];
        $expired_date=$_POST['expired_date'];
        if ($id_voucer == 0) {
            $this->ModelVoucher->InsertVoucher($no_voucer,$id_source,$id_room_type,$id_hotel,$price,$start_date,$end_date,$expired_date);
        } else {
            $this->ModelVoucher->updateVoucher($id_voucer,$no_voucer,$id_source,$id_room_type,$id_hotel,$price,$start_date,$end_date,$expired_date);
        }
        redirect(base_url() . 'Voucher');
    }

    function deleteVoucher() {
        $id_voucer = $_POST['id'];
        $this->ModelVoucher->deleteVoucher($id_voucer);
        echo 'Data Delete';
    }
}
