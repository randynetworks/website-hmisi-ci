<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proker extends CI_Controller {

	public function proker_item($slug)
	{
		
		$this->load->helper('url');
		$this->load->view('templates/header');
		$this->load->view('proker/proker_view');
		$this->load->view('templates/footer');
	}
}
