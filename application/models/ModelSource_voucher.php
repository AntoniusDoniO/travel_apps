<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelSource_voucher
 *
 * @author durioindigo
 */
class ModelSource_voucher extends CI_Model{
    //put your code here
    function getDetailProvice($statement,$customefield){
        $xstr="SELECT $customefield FROM source_voucher $statement";
        $query = $this->db->query($xstr);
        $row = $query->row();
        return $row;
    }
     public function fetch_source_voucher($limit, $start) {
 
       $this->db->limit($limit, $start);
 
       $query = $this->db->order_by('name','ASC')->get("source_voucher");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   }
   public function record_count() {
 
       return $this->db->count_all("source_voucher");
 
   }
 

    function getListSource_voucher($statement,$customefield){
        $xstr="SELECT $customefield FROM source_voucher $statement";
        $query = $this->db->query($xstr);
        return $query;
    }
    function InsertSource_voucher($name,$phone,$email,$address){
        $xstr="INSERT INTO source_voucher (name,phone,email,address) VALUES('".$name."','".$phone."','".$email."','".$address."')";
        $this->db->query($xstr);
    }
    function updateSource_voucher($id_source_voucher,$name,$phone,$email,$address){
        $xstr="UPDATE source_voucher SET name='".$name."',phone='".$phone."',email='".$email."',address='".$address."' WHERE id_source_voucher='".$id_source_voucher."'";
        $this->db->query($xstr);
    }
    function deleteSource_voucher($id_source_voucher){
        $xstr="DELETE FROM source_voucher  WHERE id_source_voucher='".$id_source_voucher."'";
        $this->db->query($xstr);
    } 
}
