<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_Member extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		// helper
		$this->load->helper('url_helper');
		$this->load->helper('url');

		// library
		$this->load->library('pagination');

		// model
		$this->load->model('anggota_model');
	}


	public function index()
	{
		// pagination
		$config['base_url'] = 'http://localhost/website-hmisi-ci/Manage_Member/index';
		$config['total_rows'] = $this->anggota_model->countAllMember();
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
		// starter for pagination
		$data['start'] = $this->uri->segment(3);

		// session user
		$ses_id = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $ses_id])->row_array();

		// title member page
		$data['title'] = "Member HMISI";

		// get data member per page
		$data['members'] = $this->anggota_model->get_page($config['per_page'], $data['start']);


		// logic session login empty
		if (empty($ses_id)) {

			// message not login
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">
				Oupps, you\'re not Login!
			</div>'
			);

			// redirect login failed
			redirect('auth');
		}

		// load view
		$this->load->view('templates/dashboard_header', $data);
		$this->load->view('templates/dashboard_sidebar', $data);
		$this->load->view('templates/dashboard_topbar', $data);
		$this->load->view('admin/manage_member', $data);
		$this->load->view('templates/dashboard_footer');
	}


	public function create()
	{

		// helper & Library
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');



		// $foto    = $this->upload->data('file_name');
		$nama	 = $this->input->post('full-name');
		$jabatan = $this->input->post('depart');

		// array for set data
		$data = array(
			// 'img'          => $foto,
			'nama-lengkap' => $nama,
			'jabatan'      => $jabatan
		);

		// medel member create data
		$this->anggota_model->set_member($data, 'anggota');

		// message success saved
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert">
						Member Saved!
					</div>'
		);

		// redirect save success
		redirect('Manage_Member');

		// // logicm if form validation === False
		// if ($this->form_validation->run() === FALSE) {

		// 	// message faled saved
		// 	$this->session->set_flashdata(
		// 		'message',
		// 		'<div class="alert alert-danger" role="alert">
		//             Member Not Save Saved!
		//         </div>'
		// 	);

		// 	// redirect save failed
		// 	redirect('Input_Member');
		// } else {



		// // library upload
		// $this->load->library('upload', $config);

		// // get data image
		// $foto = $_FILES['image'];
		// $config['upload_path'] = './assets/img/SO';
		// $config['allowed_types'] = 'jpg|png|jpeg|JPG';

		// if (!$this->upload->do_upload('image')) {

		// 	// message failed saved
		// 	$this->session->set_flashdata(
		// 		'message',
		// 		'<div class="alert alert-danger" role="alert">
		// 		Member failed Saved!, wrong format Image!
		// 		</div>'

		// 	);

		// 	// redirect save failed
		// 	redirect('Input_Member');
		// }



	}

	public function hapus($id)
	{
		// select id clicked
		$where = array('id' => $id);

		// model delete data
		$this->anggota_model->hapus_data($where, 'anggota');

		// message member deleted
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert">
                Member deleted!
            </div>'
		);

		// redirect sucsess
		redirect('Manage_Member');
	}

	public function edit($id)
	{

		$ses_id = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $ses_id])->row_array();

		$data['title'] = "Edit Member HMISI";
		$data['members'] = $this->db->get_where('anggota', ['id' => $id])->result_array();

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
		$this->load->view('admin/edit_anggota', $data);
		$this->load->view('templates/dashboard_footer');
	}

	public function update()
	{
		$id           = $this->input->post('id');
		// $foto    = $this->upload->data('file_name');
		$nama_lengkap = $this->input->post('nama');
		$jabatan 	  = $this->input->post('jabatan');

		// array for set data
		$data = array(
			// 'img'          => $foto,
			'nama-lengkap' => $nama_lengkap,
			'jabatan' => $jabatan
		);

		$where = array(
			'id' => $id
		);

		// medel member create data
		$this->anggota_model->update_data($where, $data, 'anggota');

		// message success saved
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert">
						Member is Changed!
					</div>'
		);

		// redirect save success
		redirect('Manage_Member');
	}
}
