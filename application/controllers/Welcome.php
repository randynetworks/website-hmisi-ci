<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('proker_model');
		$this->load->model('news_model');
		$this->load->model('anggota_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		// ambil session
		$ses_id = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $ses_id])->row_array();

		if (empty($ses_id)) {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">
				Oupps, you\'re not Login!
			</div>'
			);
			redirect('auth');
		}


		$data['prokers'] = $this->proker_model->get_Proker();
		$data['news']    = $this->news_model->get_news();
		$data['members'] = $this->anggota_model->get_pengurus();

		$this->load->helper('url');
		$this->load->view('templates/header');
		$this->load->view('index', $data);
		$this->load->view('templates/footer');
	}
}
