<?php
class Proker_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function all_Proker()
	{
		$query = $this->db->get('proker-img', 5);
		// menggunakan result array karena data > 1
		return $query->result_array();

		// NOTES : TINGGAL BUAT PAGINATION
	}

	public function get_Proker($slug = FALSE)
	{

		if ($slug == FALSE) {
			$query = $this->db->get('proker');
			// menggunakan result array karena data > 1
			return $query->result_array();
		}

		$query = $this->db->get_where('proker', array('slug' => $slug));
		// menggunakan row array karena cuma 1 data
		return $query->row_array();
	}

	public function get_image_Proker($slug_proker)
	{

		$query = $this->db->get_where('proker-img', array('slug' => $slug_proker));
		// menggunakan row array karena cuma 1 data
		return $query->result_array();
	}

	public function countAllProker()
	{
		return $this->db->get('proker-img')->num_rows();
	}

	public function get_page($limit, $start)
	{
		$query = $this->db->get('proker-img', $limit, $start);
		// menggunakan result array karena data > 1
		return $query->result_array();
	}

	public function set_proker($data, $table)
	{
		return $this->db->insert($table, $data);
	}

	public function hapus_data($where, $table)
	{
		$this->load->helper('url');
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
}
