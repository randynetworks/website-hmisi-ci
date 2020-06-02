<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_Berita extends CI_Controller
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
		$config['base_url'] = 'http://localhost/website-hmisi-ci/Input_Berita/index';
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
		$this->load->view('admin/input_berita', $data);
		$this->load->view('templates/dashboard_footer');
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
		redirect('Input_Berita');
	}
}
