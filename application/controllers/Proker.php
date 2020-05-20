<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proker extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('proker_model');
        $this->load->helper('url_helper');
        
    }

	public function view($slug = NULL)
	{
        $data['proker_item'] = $this->proker_model->get_Proker($slug);
        
		$this->load->helper('url');
		$this->load->view('templates/header');
		$this->load->view('proker/proker_view', $data);
		$this->load->view('templates/footer');
    }
    
}
