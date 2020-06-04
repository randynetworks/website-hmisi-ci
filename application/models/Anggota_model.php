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

	// pagination

	public function get_page($limit, $start)
	{
		$query = $this->db->get('anggota', $limit, $start);
		// menggunakan result array karena data > 1
		return $query->result_array();
	}

	public function countAllMember()
	{
		return $this->db->get('anggota')->num_rows();
	}

	public function set_member($data, $table)
	{

		return $this->db->insert($table, $data);
	}

	public function hapus_data($where, $table)
	{
		$this->load->helper('url');
		$this->db->where($where);
		$this->db->delete($table);
	}
}
