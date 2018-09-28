<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelVoucher
 *
 * @author durioindigo
 */
class ModelVoucher extends CI_Model{
    //put your code here
    function getDetailVoucer_travel($statement,$customefield){
        $xstr="SELECT $customefield FROM voucer_travel $statement";
        $query = $this->db->query($xstr);
        $row = $query->row();
        return $row;
    }
     public function fetch_voucer_travel($limit, $start) {
 
       $this->db->limit($limit, $start);
       $this->db->select('id_voucer,no_voucer,voucer_travel.id_source,voucer_travel.id_room_type,voucer_travel.id_hotel,price,start_date,end_date,expired_date,hotel_name,name_type,name');
       $this->db->join('source_voucher','source_voucher.id_source_voucher=voucer_travel.id_source');
       $this->db->join('room_type','room_type.id_room_type=voucer_travel.id_room_type');
       $this->db->join('hotel','hotel.id_hotel=voucer_travel.id_hotel');
       $query = $this->db->order_by('id_voucer,start_date,no_voucer','DESC')->get("voucer_travel");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   }
   public function record_count() {
 
       return $this->db->count_all("voucer_travel");
 
   }
 

    function getListVoucher($statement,$customefield){
        $xstr="SELECT $customefield FROM voucer_travel $statement";
        $query = $this->db->query($xstr);
        return $query;
    }
    function InsertVoucher($no_voucer,$id_source,$id_room_type,$id_hotel,$price,$start_date,$end_date,$expired_date){
        $xstr="INSERT INTO voucer_travel (no_voucer,id_source,id_room_type,id_hotel,price,start_date,end_date,expired_date) VALUES('".$no_voucer."','".$id_source."','".$id_room_type."','".$id_hotel."','".$price."','".$start_date."','".$end_date."','".$expired_date."')";
        $this->db->query($xstr);
    }
    function updateVoucher($id_voucer,$no_voucer,$id_source,$id_room_type,$id_hotel,$price,$start_date,$end_date,$expired_date){
        $xstr="UPDATE voucer_travel SET no_voucer='".$no_voucer."',id_source='".$id_source."',id_room_type='".$id_room_type."',id_hotel='".$id_hotel."',price='".$price."',start_date='".$start_date."',end_date='".$end_date."',expired_date='".$expired_date."' WHERE id_voucer='".$id_voucer."'";
        $this->db->query($xstr);
    }
    function deleteVoucher($id_voucer){
        $xstr="DELETE FROM voucer_travel  WHERE id_voucer='".$id_voucer."'";
        $this->db->query($xstr);
    }
}
