<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function index()
    {
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

        $this->load->helper('url');
        $this->load->view('admin/dashboard', $data);
    }
}
