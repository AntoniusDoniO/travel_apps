<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Subdistricr
 *
 * @author durioindigo
 */
class Subdistricr extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $useracces = $this->session->userdata('useracces');
        if (!empty($useracces)) {
            // load URL helper
            $this->load->helper('url');
            $this->load->model('ModelSubdistricr');
            $this->load->model('ModelDistrict');
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
        $config['base_url'] = base_url() . 'Subdistricr/page';
        $total_rows = $this->ModelSubdistricr->record_count();
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 5;
        $config["uri_segment"] = 3;

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-right"><nav><ul class="pagination justify-content-right">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $dataTable["results"] = $this->ModelSubdistricr->fetch_sub_district($config["per_page"], $page);
        $dataTable['links'] = $this->pagination->create_links();
        $this->load->view('header', $data);
        $this->load->view('subdistricr', $dataTable);
        $this->load->view('footer', $data);

//         }else{
//             redirect(base_url());
//         }
    }

    function page() {
        $data['path'] = base_url() . 'assets';
        $config = array();
        $config['base_url'] = base_url() . 'Subdistricr/page';
        $config['total_rows'] = $this->ModelSubdistricr->record_count();
        $config['per_page'] = 5;
        $config["uri_segment"] = 3;

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-right"><nav><ul class="pagination justify-content-right">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $dataTable["results"] = $this->ModelSubdistricr->fetch_sub_district($config["per_page"], $page);
        $dataTable['links'] = $this->pagination->create_links();

        $this->load->view('header', $data);
        $this->load->view('subdistricr', $dataTable);
        $this->load->view('footer', $data);
    }

    function act() {
//        $this->load->model('ModelSubdistricr');
        $id_sub_district = $_POST['id_sub_district'];
        $id_district = $_POST['id_district'];
        $subdistricr_name = $_POST['sub_district_name'];
        if ($id_sub_district == 0) {
            $this->ModelSubdistricr->InsertSubdistricr($subdistricr_name, $id_district);
        } else {
            $this->ModelSubdistricr->updateSubdistricr($id_sub_district, $subdistricr_name, $id_district);
        }
        redirect(base_url() . 'Subdistricr');
    }

    function deleteSubDistrict() {
        $id_subdistricr = $_POST['id'];
        $this->ModelSubdistricr->deleteSubdistricr($id_subdistricr);
        echo 'Data Delete';
    }

}
