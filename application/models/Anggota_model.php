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

	public function set_member()
	{
		$this->load->helper('url');

		$foto = $_FILES['img'];

		if ($foto = '') {
		} else {
			$config['upload_path'] = './assets/img/SO';
			$config['allowed_types'] = 'jpg|png|jpeg|JPG';

			$this->upload->initialize($config);
			if (!$this->upload->do_upload('img')) {
				echo "upload gagal";
				die;
			} else {
				$foto = $this->upload->data('file_name');
			}
		}

		$data = array(
			'nama-lengkap' => $this->input->post('full-name'),
			'jabatan' => $this->input->post('depart'),
			'img' => $foto
		);

		return $this->db->insert('anggota', $data);
	}

	public function hapus_data($where, $table)
	{
		$this->load->helper('url');
		$this->db->where($where);
		$this->db->delete($table);
	}
}
