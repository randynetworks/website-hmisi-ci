<?php
class Anggota_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_Pengurus(){
        
            $query = $this->db->get('anggota');
        // menggunakan result array karena data > 1
            return $query->result_array();
        
    }

}