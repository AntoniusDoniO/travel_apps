<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of booking
 *
 * @author durioindigo
 */
require APPPATH . 'controllers/api/Login.php';

class Confirm_booking extends Login {

    //put your code here
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->cektoken();
        $this->load->model('ModelVoucher');
    }

    function index_post() {
       
        $data=$id_user=$this->cektoken(); 
        
        $this->load->model('ModelHotel');
        $start_date = $this->post('start_date', TRUE);
        $end_date = $this->post('end_date', TRUE);
        $id_hotel = $this->post('id', TRUE);
        $id_room_type = $this->post('id_type');
        
        $datahotel= $this->ModelHotel->getDetailHotel("INNER JOIN voucer_travel on voucer_travel.id_hotel=hotel.id_hotel"
                . " INNER JOIN room_type on room_type.id_room_type=voucer_travel.id_room_type"
                . " WHERE voucer_travel.id_hotel='" . $id_hotel . "' and room_type.id_room_type='" . $id_room_type . "' and (start_date >='" . $start_date . "' or end_date>='" . $end_date . "') group by room_type.id_room_type order by start_date ASC",
                'id_voucer,hotel_name,address,phone,primary_pic,count(id_voucer)as array_length,sum(price) as total_price ');
        
        
        
        if (empty($datahotel->id_voucer)) {
            $data['info'] = 'Data not Found';
        } else {
            $data['nama_hotel']=$datahotel->hotel_name;
            $data['address_hotel']=$datahotel->address;
            $data['phone']=$datahotel->phone;
            $data['primary_pic']=$datahotel->primary_pic;
            $data['array_length']=$datahotel->array_length;
            $data['total_price']=$datahotel->total_price;
           
           $datahotelDetail = $this->ModelVoucher->getListVoucher("
INNER JOIN room_type on room_type.id_room_type=voucer_travel.id_room_type
WHERE voucer_travel.id_hotel='" . $id_hotel . "' and room_type.id_room_type='" . $id_room_type . "' and (start_date >='" . $start_date . "' or end_date>='" . $end_date . "')
order by start_date ASC", "id_voucer,no_voucer,room_type.id_room_type
,name_type,start_date,end_date,expired_date,price");
           $data['detail_voucer'][]=$datahotelDetail->result();

        }

        $this->response($data, 200);
    }

}
