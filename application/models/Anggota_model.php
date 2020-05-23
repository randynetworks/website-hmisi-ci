<?php
class Anggota_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_Pengurus()
    {
        $this->db->where_not_in('jabatan', 'anggota');
        $query = $this->db->get('anggota');
        // menggunakan result array karena data > 1
        return $query->result_array();
    }

    public function get_Anggota()
    {
        $query = $this->db->get('anggota');
        // menggunakan result array karena data > 1
        return $query->result_array();
    }
}
