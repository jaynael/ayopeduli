<?php
 
class Create extends CI_Controller{	
	public function __construct(){		
		parent::__construct();
		//$this->load->model('buataksim','',TRUE);
	}
	
	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
	
		$data= array(
			'title' => "Buat Aksimu Sekarang Juga"
		);
	
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('cat', 'cat', 'required');
	
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('header', $data);
			$this->load->view('aksi/create');
			$this->load->view('footer');
	
		}
		else
		{
			$this->load->helper('url');
			$this->news_model->set_news();
			$this->load->view('news/success');
		}
	}
	
}