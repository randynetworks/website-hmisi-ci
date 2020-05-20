<?php
class News_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function all_news(){
        $query = $this->db->get('news',5);
        // menggunakan result array karena data > 1
        return $query->result_array();

        // NOTES : TINGGAL BUAT PAGINATION
    }

    public function get_News($slug = FALSE){
        
        if ($slug == FALSE) {
            $this->db->order_by('id','DESC');
            $query = $this->db->get('news', 1);
        // menggunakan result array karena data > 1
            return $query->result_array();
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        // menggunakan row array karena cuma 1 data
        return $query->row_array();
        
    }

}