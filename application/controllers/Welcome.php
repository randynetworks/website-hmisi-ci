<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('proker_model');
        $this->load->helper('url_helper');
        
    }

	public function index()
	{
		$data['prokers'] = $this->proker_model->get_Proker();
		
		$this->load->helper('url');
		$this->load->view('templates/header');
		$this->load->view('index', $data);
		$this->load->view('templates/footer');
	}
}
