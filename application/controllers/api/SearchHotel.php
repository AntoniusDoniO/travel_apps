<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of hotel
 *
 * @author durioindigo
 */
require APPPATH . 'controllers/api/Login.php';

class SearchHotel extends Login {

    //put your code here

    function __construct($config = 'rest') {
        parent::__construct($config);

//        $this->cektoken();
        $this->load->model('ModelHotel');
    }

    function index_post() {
        $lat = $this->post('lat', TRUE);
        $long = $this->post('lng', TRUE);
        $start_date = $this->post('start_date', TRUE);
        $end_date = $this->post('end_date', TRUE);
        $city = $this->post('city', TRUE);
        if (empty($city)) {
            $datahotel = $this->ModelHotel->getListHotelCustome("* FROM 
(SELECT h.*,count(v.id_voucer)  AS stok,v.price,(((acos(sin((" . $lat . "*pi()/180)) * 
sin((lat*pi()/180))+cos((". $lat . "*pi()/180)) * 
cos((lat*pi()/180)) * cos(((" . $long . "- lng)* 
pi()/180))))*180/pi())*60*1.1515 ) as distance 
FROM hotel h
LEFT JOIN voucer_travel v ON h.id_hotel=v.id_hotel
LEFT JOIN hotel_pic p ON h.id_hotel=p.id_hotel
WHERE 1 and v.start_date >='" . $start_date . "' or v.end_date>='" . $end_date . "'
GROUP BY h.id_hotel 
HAVING distance < 10 and stok>0
limit 0,10) as X 
ORDER BY id_hotel DESC");
        } else {
            $datahotel = $this->ModelHotel->getListHotelCustome("h.id_hotel,h.hotel_name,h.`address`,h.phone,v.price,p.pic,h.lat,h.lng,count(v.id_voucer) AS stok FROM hotel h 
              LEFT JOIN voucer_travel v ON h.id_hotel=v.id_hotel
              LEFT JOIN hotel_pic p ON h.id_hotel=p.id_hotel
              INNER JOIN sub_district subD on subD.id_sub_district=h.id_sub_district
              INNER JOIN district distrct on distrct.id_district=subD.id_district
              INNER JOIN province province on province.id_province=distrct.id_province
              WHERE province_name LIKE '" . $city . "' and v.start_date >='" . $start_date . "' or v.end_date>='" . $end_date . "'
              GROUP BY h.id_hotel 
              HAVING stok >0 limit 0,50");
        }
        $data = $datahotel->result();
        if(empty($data)){
          $data['info']='Data not Found';  
        }
        
        $this->response($data, 200);
    }

    function index_get() {
        $this->load->model('ModelVoucher');
        $id_hotel= $this->get('id');
        $start_date = $this->get('start_date', TRUE);
        $end_date = $this->get('end_date', TRUE);
        $datahotel = $this->ModelVoucher->getListVoucher("INNER JOIN hotel on hotel.id_hotel=voucer_travel.id_hotel
INNER JOIN room_type on room_type.id_room_type=voucer_travel.id_room_type
WHERE voucer_travel.id_hotel='1' and start_date >='".$start_date."' or end_date>'".$end_date."'
group by room_type.id_room_type order by room_type.id_room_type DESC","id_voucer,no_voucer,hotel.id_hotel,room_type.id_room_type,
hotel_name,name_type,start_date,end_date,expired_date,price,primary_pic");
        $data = $datahotel->result();
        if(empty($data)){
          $data['info']='Data not Found';  
        }
        
        $this->response($data, 200);
        
    }

}
