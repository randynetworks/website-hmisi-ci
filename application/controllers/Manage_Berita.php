<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_Berita extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->model('news_model');
		$this->load->library('pagination');
	}

	public function index()
	{
		// pagination
		$config['base_url'] = 'http://localhost/website-hmisi-ci/Manage_Berita/index';
		$config['total_rows'] = $this->db->get('news')->num_rows();
		$config['per_page'] = 5;

		// styling pagination
		$config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		// initialisasi
		$this->pagination->initialize($config);

		$ses_id = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $ses_id])->row_array();
		$data['title'] = "Input Berita HMISI";
		$data['start'] = $this->uri->segment(3);

		$data['members'] = $this->news_model->get_page($config['per_page'], $data['start']);

		$data['news'] = $this->db->get('news')->result_array();

		if (empty($ses_id)) {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">
				Oupps, you\'re not Login!
			</div>'
			);
			redirect('auth');
		}


		$this->load->helper('url');
		$this->load->view('templates/dashboard_header', $data);
		$this->load->view('templates/dashboard_sidebar', $data);
		$this->load->view('templates/dashboard_topbar', $data);
		$this->load->view('admin/manage_berita', $data);
		$this->load->view('templates/dashboard_footer');
	}

	public function create()
	{
		// helper & Library
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');

		// $foto    = $this->upload->data('file_name');
		$slug 		= $this->input->post('slug');
		$create_by 	= $this->input->post('create_by');
		$title 		= $this->input->post('title');
		$text 		= $this->input->post('text');

		// array for set data
		$data = array(
			// 'img'          => $foto,
			'slug' => $slug,
			'create_by' => $create_by,
			'title' => $title,
			'text' => $text
		);

		// medel member create data
		$this->news_model->set_news($data, 'news');

		// message success saved
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert">
						News Saved!
					</div>'
		);

		// redirect save success
		redirect('Manage_Berita');

		// $config['upload_path']          = './assets/img/proker-img';
		// $config['allowed_types']        = 'gif|jpg|png';
		// $config['max_size']             = 2048;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		// $this->load->library('upload', $config);

		// if (!$this->upload->do_upload('image')) {
		// 	$this->session->set_flashdata(
		// 		'message',
		// 		'<div class="alert alert-danger" role="alert">
		// 		Failed Upload!
		// 	</div>'
		// 	);
		// } else {


		// }
	}

	public function edit($id)
	{

		$ses_id = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $ses_id])->row_array();

		$data['title'] = "Edit Berita HMISI";
		$data['news'] = $this->db->get_where('news', ['id' => $id])->result_array();

		if (empty($ses_id)) {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">
				Oupps, you\'re not Login!
			</div>'
			);
			redirect('auth');
		}


		$this->load->helper('url');
		$this->load->view('templates/dashboard_header', $data);
		$this->load->view('templates/dashboard_sidebar', $data);
		$this->load->view('templates/dashboard_topbar', $data);
		$this->load->view('admin/edit_berita', $data);
		$this->load->view('templates/dashboard_footer');
	}

	public function update()
	{
		$id         = $this->input->post('id');
		// $foto    = $this->upload->data('file_name');
		$slug 		= $this->input->post('slug');
		$create_by 	= $this->input->post('create_by');
		$title 		= $this->input->post('title');
		$text 		= $this->input->post('text');

		// array for set data
		$data = array(
			// 'img'          => $foto,
			'slug' => $slug,
			'create_by' => $create_by,
			'title' => $title,
			'text' => $text
		);

		$where = array(
			'id' => $id
		);

		// medel member create data
		$this->news_model->update_news($where, $data, 'news');

		// message success saved
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert">
						News is Changed!
					</div>'
		);

		// redirect save success
		redirect('Manage_Berita');
	}

	public function hapus($id)
	{
		$where = array('id' => $id);

		$this->news_model->hapus_data($where, 'news');
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert">
                News deleted!
            </div>'
		);
		redirect('Manage_Berita');
	}
}
