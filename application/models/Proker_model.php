<?php
class Proker_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_Proker($slug = FALSE){
        
        if ($slug == FALSE) {
            $query = $this->db->get('proker');
        // menggunakan result array karena data > 1
            return $query->result_array();
        }

        $query = $this->db->get_where('proker', array('slug' => $slug));
        // menggunakan row array karena cuma 1 data
        return $query->row_array();
        
    }

}