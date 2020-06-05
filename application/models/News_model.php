<?php
class News_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function all_news()
	{
		$query = $this->db->get('news', 5);
		// menggunakan result array karena data > 1
		return $query->result_array();

		// NOTES : TINGGAL BUAT PAGINATION
	}

	public function get_News($slug = FALSE)
	{

		if ($slug == FALSE) {
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('news', 1);
			// menggunakan result array karena data > 1
			return $query->result_array();
		}

		$query = $this->db->get_where('news', array('slug' => $slug));
		// menggunakan row array karena cuma 1 data
		return $query->row_array();
	}

	public function get_page($limit, $start)
	{
		$query = $this->db->get('anggota', $limit, $start);
		// menggunakan result array karena data > 1
		return $query->result_array();
	}

	public function set_news($data, $table)
	{
		return $this->db->insert($table, $data);
	}

	public function hapus_data($where, $table)
	{
		$this->load->helper('url');
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function edit_news($where, $table)
	{
		$this->load->helper('url');
		return $this->db->get_where($table, $where)->row_array();
	}

	public function update_news($where, $data, $table)
	{
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
}
