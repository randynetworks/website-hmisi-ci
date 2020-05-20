<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
        
    }

	public function index()
	{
		$data['news'] = $this->news_model->get_news();
		$data['newsAll'] = $this->news_model->all_news();
		
		$this->load->helper('url');
		$this->load->view('templates/header');
		$this->load->view('news/news', $data);
		$this->load->view('templates/footer');
	}
}
