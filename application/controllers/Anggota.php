<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('anggota_model');
        $this->load->helper('url_helper');
        
    }

	public function view($slug = NULL)
	{
        $data['members'] = $this->anggota_model->get_Anggota();
        
		$this->load->helper('url');
		$this->load->view('templates/header');
		$this->load->view('anggota/anggota_hmisi', $data);
		$this->load->view('templates/footer');
    }
    
}
