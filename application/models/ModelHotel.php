<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelHotel
 *
 * @author durioindigo
 */
class ModelHotel extends CI_Model{
    //put your code here
    function getDetailHotel($statement,$customefield){
        $xstr="SELECT $customefield FROM hotel $statement";
        $query = $this->db->query($xstr);
        $row = $query->row();
        return $row;
    }
     public function fetch_hotel($limit, $start) {
 
       $this->db->limit($limit, $start);
 
       $query = $this->db->order_by('hotel_name','ASC')->get("hotel");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   }
   public function record_count() {
 
       return $this->db->count_all("hotel");
 
   }
   function getListHotelCustome($statement){
        $xstr="SELECT  $statement";
        $query = $this->db->query($xstr);
        return $query;
    }

    function getListHotel($statement,$customefield){
        $xstr="SELECT $customefield FROM hotel $statement";
        $query = $this->db->query($xstr);
        return $query;
    }
    function InsertHotel($hotel_name,$id_sub_district,$address,$phone,$lat,$long,$primary_pic){
        $xstr="INSERT INTO hotel (hotel_name,id_sub_district,address,phone,lat,lng,primary_pic) VALUES('".$hotel_name."','".$id_sub_district."','".$address."','".$phone."','".$lat."','".$long."','".$primary_pic."')";
        $this->db->query($xstr);
    }
    function updateHotel($id_hotel,$hotel_name,$id_sub_district,$address,$phone,$lat,$long,$primary_pic){
        $xstr="UPDATE hotel SET hotel_name='".$hotel_name."',id_sub_district='".$id_sub_district."',address='".$address."',phone='".$phone."',lat='".$lat."',lng='".$long."',primary_pic='".$primary_pic."' WHERE id_hotel='".$id_hotel."'";
        $this->db->query($xstr);
    }
    function deleteHotel($id_hotel){
        $xstr="DELETE FROM hotel  WHERE id_hotel='".$id_hotel."'";
        $this->db->query($xstr);
    }
}
