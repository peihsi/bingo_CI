<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class icd_model extends CI_Model{
     function __construct()
     {
          parent::__construct();
     }

     function search_simple($words){
          $this->db->select("row_id,category_outline,icd9_code,icd10_code,description,expiration,items");
          if (strpos($words, ' ') !== false){    
               $multiple_key_words = explode(" ", $words);
               $multiple_key_words_len = count($multiple_key_words);
          
               for ($i=0;$i<$multiple_key_words_len;$i++){
                    $this->db->where("(`category_outline` LIKE '%$multiple_key_words[$i]%' || `icd9_code` LIKE '%$multiple_key_words[$i]%' || `icd10_code` LIKE '%$multiple_key_words[$i]%' || `description` LIKE '%$multiple_key_words[$i]%' || `expiration` LIKE '%$multiple_key_words[$i]%')");
               }
          
          }
          else{
               $multiple_key_words = $words;
               $this->db->where("(`category_outline` LIKE '%$multiple_key_words%' || `icd9_code` LIKE '%$multiple_key_words%' || `icd10_code` LIKE '%$multiple_key_words%' || `description` LIKE '%$multiple_key_words%' || `expiration` LIKE '%$multiple_key_words%')");
          }
          $this->db->from("icd_cm");
          $this->db->limit(100);
          $result = $this->db->get()->result_array();
          return $result;
     } 

     function search_row($words){
          $this->db->select('*');
          $this->db->from("icd_cm");
          $this->db->where("row_id",$words);
          $result = $this->db->get()->result();
          return $result;
     }    
}