<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelDistrict
 *
 * @author durioindigo
 */
class ModelDistrict extends CI_Model{
    //put your code here
    function getDetailDistrict($statement,$customefield){
        $xstr="SELECT $customefield FROM district $statement";
        $query = $this->db->query($xstr);
        $row = $query->row();
        return $row;
    }
     public function fetch_district($limit, $start) {
 
       $this->db->limit($limit, $start);
       $this->db->join('province','province.id_province=district.id_province');
       $query = $this->db->order_by('province_name,district_name','ASC')->get("district");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   }
   public function record_count() {
 
       return $this->db->count_all("district");
 
   }
 

    function getListDistrict($statement,$customefield){
        $xstr="SELECT $customefield FROM district $statement";
        $query = $this->db->query($xstr);
        return $query;
    }
    function InsertDistrict($district_name,$id_province){
        $xstr="INSERT INTO district (district_name,id_province) VALUES('".$district_name."','".$id_province."')";
        $this->db->query($xstr);
    }
    function updateDistrict($id_district,$district_name,$id_province){
        $xstr="UPDATE district SET district_name='".$district_name."',id_province='".$id_province."' WHERE id_district='".$id_district."'";
        $this->db->query($xstr);
    }
    function deleteDistrict($id_district){
        $xstr="DELETE FROM district  WHERE id_district='".$id_district."'";
        $this->db->query($xstr);
    }
}
